<?php

namespace App\Enums;

enum DocumentType: string
{
    case TRADE_LICENSE = 'Trade License';
    case ESTABLISHMENT_CARD = 'Establishment Card';
    case VEHICLES = 'Vehicles';
    case DOMAIN_SUBSCRIPTIONS = 'Domain Subscriptions';
    case TENANCY_AGREEMENT = 'Tenancy Agreement';
    case ELECTRICITY_BILLS = 'Electricity Bills';
    case WIFI_BILLS = 'Wifi Bills';
    case SEWERAGE_BILLS = 'Sewerage Bills';
    case MOBILE_BILLS = 'Mobile Bills';


    public static function getLabel(DocumentType $type): string
    {
        return $type->value;  // You can modify this to return any custom string if needed
    }
}
