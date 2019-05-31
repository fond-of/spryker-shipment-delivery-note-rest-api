<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client;

use FondOfSpryker\Client\ShipmentDeliveryNote\ShipmentDeliveryNoteClientInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNote\Business\ShipmentDeliveryNote\ShipmentDeliveryNote;
use Generated\Shared\Transfer\ShipmentDeliveryNoteListTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;

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

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     * 
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer
     */
    public function createShipmentDeliveryNote(ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer): ShipmentDeliveryNoteResponseTransfer
    {
        return $this->shipmentDeliveryNoteClient->createShipmentDeliveryNote($shipmentDeliveryNoteTransfer);
    }
}
