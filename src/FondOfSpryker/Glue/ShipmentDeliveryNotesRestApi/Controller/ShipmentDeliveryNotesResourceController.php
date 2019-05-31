<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Controller;

use Generated\Shared\Transfer\RestInvoiceItemsTransfer;
use Generated\Shared\Transfer\RestInvoicesAttributesTransfer;
use Generated\Shared\Transfer\RestInvoicesTransfer;
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


}
