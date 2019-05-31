<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper;

use Generated\Shared\Transfer\InvoiceTransfer;
use Generated\Shared\Transfer\RestInvoicesAttributesTransfer;
use Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;

interface ShipmentDeliveryNoteResourceMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer
     */
    public function mapShipmentDeliveryNotesAttributesToShipmentDeliveryNoteTransfer(RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer): ShipmentDeliveryNoteTransfer;

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     *
     * @return \Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer
     */
    public function mapShipmentDeliveryNoteTransferToRestShipmentDeliveryNotesAttributesTransfer(ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer): RestShipmentDeliveryNotesAttributesTransfer;
}
