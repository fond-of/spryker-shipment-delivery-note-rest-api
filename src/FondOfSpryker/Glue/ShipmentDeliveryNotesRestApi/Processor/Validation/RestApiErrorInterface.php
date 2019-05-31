<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation;

use Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

interface RestApiErrorInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer $shipmentDeliveryNoteResponseTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function processInvoiceErrorOnCreate(
        RestResponseInterface $restResponse,
        ShipmentDeliveryNoteResponseTransfer $shipmentDeliveryNoteResponseTransfer
    ): RestResponseInterface;
}
