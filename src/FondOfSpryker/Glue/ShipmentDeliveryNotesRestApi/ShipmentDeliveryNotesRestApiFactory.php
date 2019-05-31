<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi;

use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapper;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper\ShipmentDeliveryNoteResourceMapperInterface;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote\ShipmentDeliveryNoteReader;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote\ShipmentDeliveryNoteWriter;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote\ShipmentDeliveryNoteWriterInterface;
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


    public function createShipmentDeliveryNoteWriter(): ShipmentDeliveryNoteWriterInterface
    {
        return new ShipmentDeliveryNoteWriter(
            $this->getShipmentDeliveryNoteClient(),
            $this->createShipmentDeliveryNoteReader(),
            $this->getResourceBuilder(),
            $this->createShipmentDeliveryNoteResourceMapper(),
            $this->createRestApiError(),
            $this->createRestApiValidator()
        );
    }
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
