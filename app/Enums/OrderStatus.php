<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'Pending';
    case AwaitingPayment = 'Awaiting Payment';
    case AwaitingFullfillment = 'Awaiting Fullfillment';
    case AwaitingShipment = 'Awaiting Shipment';
    case PartiallyShipped = 'Partially Shipped';
    case Shipped = 'Shipped';
    case AwaitingPickup = 'Awaiting Pickup';
    case Completed = 'Completed';

    public static function values()
    {
        return array_column(static::cases(), 'value');
    }
}
