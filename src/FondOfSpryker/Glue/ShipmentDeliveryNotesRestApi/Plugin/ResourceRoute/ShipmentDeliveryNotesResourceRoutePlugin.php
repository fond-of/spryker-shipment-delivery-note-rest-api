<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Plugin\ResourceRoute;

use FondOfSpryker\Glue\InvoicesRestApi\InvoicesRestApiConfig;
use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\ShipmentDeliveryNotesRestApiConfig;
use Generated\Shared\Transfer\RestShipmentDeliveryNotesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\ShipmentDeliveryNotesRestApiFactory getFactory()
 */
class ShipmentDeliveryNotesResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection
            ->addGet(ShipmentDeliveryNotesRestApiConfig::ACTION_SHIPMENT_DELIVERY_NOTES_GET)
            ->addPost(ShipmentDeliveryNotesRestApiConfig::ACTION_SHIPMENT_DELIVERY_NOTES_POST);

        return $resourceRouteCollection;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceType(): string
    {
        return ShipmentDeliveryNotesRestApiConfig::RESOURCE_SHIPMENT_DELIVERY_NOTES;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getController(): string
    {
        return ShipmentDeliveryNotesRestApiConfig::CONTROLLER_SHIPMENT_DELIVERY_NOTES;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestShipmentDeliveryNotesTransfer::class;
    }
}
