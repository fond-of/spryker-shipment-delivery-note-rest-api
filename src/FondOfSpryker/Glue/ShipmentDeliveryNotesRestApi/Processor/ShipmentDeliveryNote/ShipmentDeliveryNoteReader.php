<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote;


use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapperInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiValidatorInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\ShipmentDeliveryNotesRestApiConfig;
use Generated\Shared\Transfer\ShipmentDeliveryNoteListTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class ShipmentDeliveryNoteReader implements ShipmentDeliveryNoteReaderInterface
{
    /**
     * @var \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface
     */
    protected $shipmentDeliveryNoteClient;

    /**
     * @var \FondOfSpryker\Glue\InvoicesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapperInterface
     */
    protected $shipmentDeliveryNoteResourceMapper;

    /**
     * @var \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected $restApiError;

    /**
     * @var \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiValidatorInterface
     */
    protected $restApiValidator;

    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;


    public function __construct(
        ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface $shipmentDeliveryNoteClient,
        ShipmentDeliveryNoteResourceMapperInterface $shipmentDeliveryNoteResourceMapper,
        RestResourceBuilderInterface $restResourceBuilder,
        RestApiErrorInterface $restApiError,
        RestApiValidatorInterface $restApiValidator
    ) {

        $this->shipmentDeliveryNoteClient = $shipmentDeliveryNoteClient;
        $this->shipmentDeliveryNoteResourceMapper = $shipmentDeliveryNoteResourceMapper;
        $this->restApiError = $restApiError;
        $this->restApiValidator = $restApiValidator;
        $this->restResourceBuilder = $restResourceBuilder;

    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     *
     * @throws
     */
    public function getShipmentDeliveryNoteAttributes(RestRequestInterface $restRequest): RestResponseInterface
    {
        $orderReference = $this->getRequestParameter($restRequest, ShipmentDeliveryNotesRestApiConfig::QUERY_STRING_PARAMETER_ORDER_REFERENCE);
        $restResponse = $this->restResourceBuilder->createRestResponse();

        return $this->findShipmentDeliveryNoteListAttributesByOrderReference($restRequest, $orderReference);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param string $parameterName
     *
     * @return string
     */
    protected function getRequestParameter(RestRequestInterface $restRequest, string $parameterName): string
    {
        return $restRequest->getHttpRequest()->query->get($parameterName, '');
    }


    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function findShipmentDeliveryNoteListAttributesByOrderReference(RestRequestInterface $restRequest, string $orderReference): RestResponseInterface
    {
        $shipmentDeliveryNoteListTransfer = (new ShipmentDeliveryNoteListTransfer())->setOrderReference($orderReference);
        $shipmentDeliveryNoteListTransfer = $this->shipmentDeliveryNoteClient->findShipmentDeliveryNotesByOrderReference($shipmentDeliveryNoteListTransfer);

        $response = $this
            ->restResourceBuilder
            ->createRestResponse();

        foreach ($shipmentDeliveryNoteListTransfer->getItems() as $shipmentDeliveryNoteTransfer) {
            $restInvoicesAttributesTransfer = $this->invoiceResourceMapper->mapInvoiceTransferToRestInvoicesAttributesTransfer($invoiceTransfer);

            $response = $response->addResource(
                $this->restResourceBuilder->createRestResource(
                    InvoicesRestApiConfig::RESOURCE_INVOICES,
                    $invoiceTransfer->getIdInvoice(),
                    $restInvoicesAttributesTransfer
                )
            );
        }
        
        return $response;
    }

    /**
     * @param string $orderReference
     *
     * @return \Generated\Shared\Transfer\InvoiceResponseTransfer
     */
    public function findInvoicesByCustomerReference(string $orderReference): InvoiceResponseTransfer
    {
        $invoiceTransfer = (new InvoiceTransfer())->setOrderReference($orderReference);

        return $this->invoiceClient->findInvoiceByOrderReference($invoiceTransfer);

    }

}
