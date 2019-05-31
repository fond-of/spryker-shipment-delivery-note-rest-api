<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Controller;

use Generated\Shared\Transfer\RestShipmentDeliveryNotesAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\ShipmentDeliveryNotesRestApiFactory getFactory()
 */
class ShipmentDeliveryNotesResourceController extends AbstractController
{
    /**
     * @Glue({
     *     "getResourceById": {
     *          "summary": [
     *              "Retrieves shipment delivery notes by OrderReference."
     *          ],
     *          "parameters": [{
     *              "name": "Accept-Language",
     *              "in": "header"
     *          }],
     *          "responseAttributesClassName": "Generated\\Shared\\Transfer\\RestAttributesTransfer",
     *          "responses": {
     *              "404": "Invoice not found."
     *          }
     *     },
     *     "getCollection": {
     *          "summary": [
     *              "Retrieves list of Invoices for a Customer."
     *          ],
     *          "parameters": [{
     *              "name": "Accept-Language",
     *              "in": "header"
     *          }]
     *     }
     * })
     *
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()->createShipmentDeliveryNoteReader()->getShipmentDeliveryNoteAttributes($restRequest);
    }

    /**
     * @Glue({
     *     "post": {
     *          "summary": [
     *              "Adds an invoice"
     *          ],
     *          "parameters": [{
     *              "name": "Accept-Language",
     *              "in": "header"
     *          }],
     *          "responses": {
     *              "400": "Order Reference is missing.",
     *              "404": "Order not found.",
     *              "422": "Errors appeared during item creation."
     *          }
     *     }
     * })
     *
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Generated\Shared\Transfer\RestInvoicesTransfer $restInvoicesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function postAction(
        RestRequestInterface $restRequest,
        RestShipmentDeliveryNotesAttributesTransfer $restShipmentDeliveryNotesAttributesTransfer
    ): RestResponseInterface
    {
        return $this->getFactory()->createShipmentDeliveryNoteWriter()->createShipmentDeliveryNote($restShipmentDeliveryNotesAttributesTransfer);
    }

}
