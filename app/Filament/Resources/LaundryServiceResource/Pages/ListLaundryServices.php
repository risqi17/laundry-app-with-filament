<?php

namespace App\Filament\Resources\LaundryServiceResource\Pages;

use App\Filament\Resources\LaundryServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaundryServices extends ListRecords
{
    protected static string $resource = LaundryServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
