<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // 1. Total Orders Count
            Stat::make('Total Orders', Order::count())
                ->description('All time orders received')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),



            // 3. Pending Orders
            Stat::make('Pending Orders', Order::where('status', 'pending')->count())
                ->description('Awaiting processing')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            // 4. Delivered Orders
            Stat::make('Delivered Orders', Order::where('status', 'delivered')->count())
                ->description('Successfully fulfilled')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
                // 2. Total Sales / Revenue
            Stat::make('Total Revenue', 'PKR ' . number_format(Order::where('status', '!=', 'cancelled')->sum('total_amount'), 2))
                ->description('Total earnings (excluding cancelled)')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
        ];
    }
}
