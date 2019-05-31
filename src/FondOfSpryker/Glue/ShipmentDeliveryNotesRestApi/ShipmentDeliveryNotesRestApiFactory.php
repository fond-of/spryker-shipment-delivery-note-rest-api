<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi;

use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapper;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapperInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote\ShipmentDeliveryNoteReader;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiError;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiValidator;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation\RestApiValidatorInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class ShipmentDeliveryNotesRestApiFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Glue\OrdersRestApi\Processor\Order\OrderReaderInterface
     */
    public function createShipmentDeliveryNoteReader(): ShipmentDeliveryNoteReader
    {
        return new ShipmentDeliveryNoteReader(
            $this->getShipmentDeliveryNoteClient(),
            $this->createShipmentDeliveryNoteResourceMapper(),
            $this->getResourceBuilder(),
            $this->createRestApiError(),
            $this->createRestApiValidator()
        );
    }

    /**
     * @return \Spryker\Glue\CustomersRestApi\Processor\Customer\CustomerWriterInterface
     */
    /*public function createInvoiceWriter(): InvoiceWriterInterface
    {
        return new InvoiceWriter(
            $this->getInvoiceClient(),
            $this->createInvoiceReader(),
            $this->getResourceBuilder(),
            $this->createInvoiceResourceMapper(),
            $this->createRestApiError(),
            $this->createRestApiValidator(),
            $this->getInvoicePostCreatePlugins()
        );
    }*/
    /**
     * @return \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface
     */
    public function getShipmentDeliveryNoteClient(): ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface
    {
        return $this->getProvidedDependency(ShipmentDeliveryNotesRestApiDependencyProvider::CLIENT_SHIPMENT_DELIVERY_NOTE);
    }

    /**
     * @return \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapperInterface
     */
    public function createShipmentDeliveryNoteResourceMapper(): ShipmentDeliveryNoteResourceMapperInterface
    {
        return new ShipmentDeliveryNoteResourceMapper();
    }

    /**
     * @return \FondOfSpryker\Glue\InvoicesRestApi\Processor\Validation\RestApiValidatorInterface
     */
    public function createRestApiValidator(): RestApiValidatorInterface
    {
        return new RestApiValidator($this->createRestApiError());
    }

    /**
     * @return \FondOfSpryker\Glue\InvoicesRestApi\Processor\Validation\RestApiErrorInterface
     */
    public function createRestApiError(): RestApiErrorInterface
    {
        return new RestApiError();
    }

    /**
     * @return \FondOfSpryker\Glue\InvoicesRestApiExtension\Dependency\Plugin\Invoice PostRegisterPluginInterface[]
     */
    public function getShipmentDeliveryNotePostCreatePlugins(): array
    {
        return $this->getProvidedDependency(ShipmentDeliveryNotesRestApiDependencyProvider::PLUGINS_INVOICE_POST_CREATE);
    }
}
