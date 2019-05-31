<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\Validation;

use FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\ShipmentDeliveryNotesRestApiConfig;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class RestApiError implements RestApiErrorInterface
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
    ): RestResponseInterface
    {
        return $this->addShipmentDeliveryNoteCantCreateMessageError(
            $restResponse,
            ShipmentDeliveryNotesRestApiConfig::RESPONSE_MESSAGE_SHIPMENT_DELIVERY_NOTE_CANT_CREATE_SHIPMENT_DELIVERY_NOTE
        );
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     * @param string $errorMessage
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addShipmentDeliveryNoteCantCreateMessageError(RestResponseInterface $restResponse, string $errorMessage): RestResponseInterface
    {
        $restErrorMessageTransfer = (new RestErrorMessageTransfer())
            ->setCode(ShipmentDeliveryNotesRestApiConfig::RESPONSE_MESSAGE_SHIPMENT_DELIVERY_NOTE_CANT_CREATE_SHIPMENT_DELIVERY_NOTE)
            ->setStatus(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->setDetail($errorMessage);

        return $restResponse->addError($restErrorMessageTransfer);
    }
}
