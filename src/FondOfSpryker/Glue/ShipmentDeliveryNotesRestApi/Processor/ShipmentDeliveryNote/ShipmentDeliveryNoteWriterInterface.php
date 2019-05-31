<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote;

use Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

interface ShipmentDeliveryNoteWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function createShipmentDeliveryNote(RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer): RestResponseInterface;
}
