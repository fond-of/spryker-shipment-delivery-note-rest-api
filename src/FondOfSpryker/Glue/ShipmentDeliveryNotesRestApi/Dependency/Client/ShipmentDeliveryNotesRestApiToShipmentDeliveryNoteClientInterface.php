<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client;

use FondOfSpryker\Zed\ShipmentDeliveryNote\Business\ShipmentDeliveryNote\ShipmentDeliveryNote;
use Generated\Shared\Transfer\ShipmentDeliveryNoteListTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;

interface ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\InvoiceTransfer $invoiceTransfer
     *
     * @return \Generated\Shared\Transfer\InvoiceResponseTransfer
     */
    public function findShipmentDeliveryNotesByOrderReference(ShipmentDeliveryNoteListTransfer $shipmentDeliveryNoteListTransfer): ShipmentDeliveryNoteListTransfer;

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     * 
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer
     */
    public function createShipmentDeliveryNote(ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer): ShipmentDeliveryNoteResponseTransfer;

}
