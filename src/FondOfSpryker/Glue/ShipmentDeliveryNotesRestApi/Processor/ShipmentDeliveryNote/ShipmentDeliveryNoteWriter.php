<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote;


use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapperInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\ShipmentDeliveryNotesRestApiConfig;
use Generated\Shared\Transfer\RestCustomersAttributesTransfer;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiValidatorInterface;
use Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

class ShipmentDeliveryNoteWriter implements ShipmentDeliveryNoteWriterInterface
{
    /**
     * @var \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface
     */
    protected $shipmentDeliveryNoteClient;

    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * @var \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapperInterface
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
     * @var \Spryker\Glue\CustomersRestApi\Processor\Customer\CustomerReaderInterface
     */
    protected $shipmentDeliveryNoteReader;

    /**
     * ShipmentDeliveryNoteWriter constructor.
     *
     * @param \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface $shipmentDeliveryNoteClient
     * @param \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote\ShipmentDeliveryNoteReaderInterface $shipmentDeliveryNoteReader
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapperInterface $shipmentDeliveryNoteResourceMapper
     * @param \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiErrorInterface $restApiError
     * @param \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiValidatorInterface $restApiValidator
     */
    public function __construct(
        ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface $shipmentDeliveryNoteClient,
        ShipmentDeliveryNoteReaderInterface $shipmentDeliveryNoteReader,
        RestResourceBuilderInterface $restResourceBuilder,
        ShipmentDeliveryNoteResourceMapperInterface $shipmentDeliveryNoteResourceMapper,
        RestApiErrorInterface $restApiError,
        RestApiValidatorInterface $restApiValidator
    ) {
        $this-> shipmentDeliveryNoteClient = $shipmentDeliveryNoteClient;
        $this->shipmentDeliveryNoteReader = $shipmentDeliveryNoteReader;
        $this->restResourceBuilder = $restResourceBuilder;
        $this->shipmentDeliveryNoteResourceMapper = $shipmentDeliveryNoteResourceMapper;
        $this->restApiError = $restApiError;
        $this->restApiValidator = $restApiValidator;
    }

    /**
     * @param \Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function createShipmentDeliveryNote(RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();
        $shipmentDeliveryNoteTransfer = (new ShipmentDeliveryNoteTransfer())->fromArray($restShipmentDeliveryNotesAttributesTransfer->toArray(), true);
        $shipmentDeliveryNoteResponseTransfer = $this->shipmentDeliveryNoteClient->createShipmentDeliveryNote($shipmentDeliveryNoteTransfer);


        if (!$shipmentDeliveryNoteResponseTransfer->getIsSuccess()) {
            return $this->restApiError->processShipmentDeliveryNoteErrorOnCreate(
                $restResponse,
                $shipmentDeliveryNoteResponseTransfer
            );
        }

        $restResource = $this->restResourceBuilder->createRestResource(
            ShipmentDeliveryNotesRestApiConfig::RESOURCE_SHIPMENT_DELIVERY_NOTES,
            $shipmentDeliveryNoteResponseTransfer->getShipmentDeliveryNoteTransfer()->getOrderReference(),
            $restShipmentDeliveryNotesAttributesTransfer
        );

        return $restResponse->addResource($restResource);
    }


    /**
     * @param \Generated\Shared\Transfer\InvoiceTransfer $invoiceTransfer
     *
     * @return \Generated\Shared\Transfer\InvoiceTransfer
     */
    protected function executeInvoicePostCreatePlugins(InvoiceTransfer $invoiceTransfer): InvoiceTransfer
    {
        foreach ($this->invoicePostCreatePlugins as $invoicePostCreatePlugin) {
            $customerTransfer = $invoicePostCreatePlugin->postCreate($invoiceTransfer);
        }

        return $invoiceTransfer;
    }
}
