<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Dependency\Client;

use Generated\Shared\Transfer\ShipmentDeliveryNoteListTransfer;

interface ShipmentDeliveryNotesRestApiToShipmentDeliveryNoteClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\InvoiceTransfer $invoiceTransfer
     *
     * @return \Generated\Shared\Transfer\InvoiceResponseTransfer
     */
    public function findShipmentDeliveryNotesByOrderReference(ShipmentDeliveryNoteListTransfer $shipmentDeliveryNoteListTransfer): ShipmentDeliveryNoteListTransfer;

}
