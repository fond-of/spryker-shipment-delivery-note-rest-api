<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client;

use FondOfSpryker\Client\ShipmentDeliveryNote\ShipmentDeliveryNoteClientInterface;
use Generated\Shared\Transfer\ShipmentDeliveryNoteListTransfer;

class ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientBridge implements ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface
{
    /**
     * @var \FondOfSpryker\Client\ShipmentDeliveryNote\ShipmentDeliveryNoteClientInterface
     */
    protected $shipmentDeliveryNoteClient;

    /**
     * @param \FondOfSpryker\Client\ShipmentDeliveryNote\ShipmentDeliveryNoteClientInterface $shipmentDeliveryNoteClient
     */
    public function __construct(ShipmentDeliveryNoteClientInterface $shipmentDeliveryNoteClient)
    {
        $this->shipmentDeliveryNoteClient = $shipmentDeliveryNoteClient;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteListTransfer $shipmentDeliveryNoteListTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteListTransfer
     */
    public function findShipmentDeliveryNotesByOrderReference(ShipmentDeliveryNoteListTransfer $shipmentDeliveryNoteListTransfer): ShipmentDeliveryNoteListTransfer
    {
        return $this->shipmentDeliveryNoteClient->findShipmentDeliveryNotesByOrderReference($shipmentDeliveryNoteListTransfer);
    }
}
