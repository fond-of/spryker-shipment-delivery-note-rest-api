<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;

class ShipmentDeliveryNoteResourceMapper implements ShipmentDeliveryNoteResourceMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer
     */
    public function mapShipmentDeliveryNotesAttributesToShipmentDeliveryNoteTransfer(RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer): ShipmentDeliveryNoteTransfer
    {
        return (new ShipmentDeliveryNoteTransfer())->fromArray($restInvoicesAttributesTransfer->toArray(), true);
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     *
     * @return \Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer
     */
    public function mapShipmentDeliveryNoteTransferToRestShipmentDeliveryNotesAttributesTransfer(ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer): RestShipmentDeliveryNotesAttributesTransfer
    {
        return (new RestShipmentDeliveryNotesAttributesTransfer())->fromArray($shipmentDeliveryNoteTransfer->toArray(), true);
    }
}
