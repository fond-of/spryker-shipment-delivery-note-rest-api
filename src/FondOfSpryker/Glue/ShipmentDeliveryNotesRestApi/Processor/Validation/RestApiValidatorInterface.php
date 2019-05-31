<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation;

use Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface RestApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer $shipmentDeliveryNoteResponseTransfer
     *
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function validateInvoiceResponseTransfer(
        ShipmentDeliveryNoteResponseTransfer $shipmentDeliveryNoteResponseTransfer,
        RestRequestInterface $restRequest,
        RestResponseInterface $restResponse
    ): RestResponseInterface;

}
