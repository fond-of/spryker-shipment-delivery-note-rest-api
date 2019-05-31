<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi\Processor\ShipmentDeliveryNote;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface ShipmentDeliveryNoteReaderInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getShipmentDeliveryNoteAttributes(RestRequestInterface $restRequest): RestResponseInterface;
}
