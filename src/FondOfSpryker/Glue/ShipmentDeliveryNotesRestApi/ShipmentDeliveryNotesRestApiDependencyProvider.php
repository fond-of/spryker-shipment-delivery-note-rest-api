<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi;

use FondOfSpryker\Glue\InvoicesRestApi\Dependency\Client\InvoicesRestApiToInvoiceClientBridge;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client\ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

/**
 * @method \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\ShipmentDeliveryNotesRestApiConfig getConfig()
 */
class ShipmentDeliveryNotesRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_SHIPMENT_DELIVERY_NOTE = 'CLIENT_SHIPMENT_DELIVERY_NOTE';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $container = $this->addShipmentDeliveryNoteClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addShipmentDeliveryNoteClient(Container $container): Container
    {
        $container[static::CLIENT_SHIPMENT_DELIVERY_NOTE] = function (Container $container) {
            return new ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientBridge($container->getLocator()->shipmentDeliveryNote()->client());
        };

        return $container;
    }

}
