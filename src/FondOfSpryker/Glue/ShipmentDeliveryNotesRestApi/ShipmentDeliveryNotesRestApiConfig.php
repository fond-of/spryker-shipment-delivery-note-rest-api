<?php

namespace FondOfSpryker\Glue\ShipmentDeliveryNotesRestApi;

use Spryker\Glue\Kernel\AbstractBundleConfig;

class ShipmentDeliveryNotesRestApiConfig extends AbstractBundleConfig
{
    public const RESOURCE_SHIPMENT_DELIVERY_NOTES = 'shipment-delivery-notes';
    public const RESOURCE_SHIPMENT_DELIVERY_NOTES_ITEMS = 'items';

    public const CONTROLLER_SHIPMENT_DELIVERY_NOTES = 'shipment-delivery-notes-resource';
    public const CONTROLLER_SHIPMENT_DELIVERY_NOTE__ITEMS = 'shipment-delivery-note-items-resource';

    public const ACTION_SHIPMENT_DELIVERY_NOTES_GET = 'get';
    public const ACTION_SHIPMENT_DELIVERY_NOTES_POST = 'post';

    public const ACTION_SHIPMENT_DELIVERY_NOTE_ITEMS_POST = 'post';
    public const ACTION_SHIPMENT_DELIVERY_NOTE_ITEMS_PATCH = 'patch';

    public const RESPONSE_CODE_ITEM_VALIDATION = '102';
    public const RESPONSE_CODE_ITEM_NOT_FOUND = '103';
    public const RESPONSE_CODE_SHIPMENT_DELIVERY_NOTE_ID_MISSING = '104';
    public const RESPONSE_CODE_FAILED_CREATING_SHIPMENT_DELIVERY_NOTE = '107';

    public const QUERY_STRING_PARAMETER_ORDER_REFERENCE = 'order_reference';

    public const RESPONSE_MESSAGE_SHIPMENT_DELIVERY_NOTE_CANT_CREATE_SHIPMENT_DELIVERY_NOTE = 'Shipment delivery note can not be created';

}
