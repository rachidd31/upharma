<?php

namespace Webkul\Sale\Filament\Clusters\Orders\Resources\CustomerResource\Pages;

use Filament\Pages\SubNavigationPosition;
use Illuminate\Contracts\Support\Htmlable;
use Webkul\Contact\Filament\Resources\PartnerResource\Pages\CreatePartner as BaseCreateCustomer;
use Webkul\Sale\Filament\Clusters\Orders\Resources\CustomerResource;

class CreateCustomer extends BaseCreateCustomer
{
    protected static string $resource = CustomerResource::class;

    public function getSubNavigationPosition(): SubNavigationPosition
    {
        return SubNavigationPosition::Top;
    }

    public function getTitle(): string|Htmlable
    {
        return __('sales::filament/clusters/orders/resources/customer/pages/create-customer.title');
    }
}
