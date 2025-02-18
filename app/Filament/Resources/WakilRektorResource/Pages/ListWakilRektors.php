<?php

namespace App\Filament\Resources\WakilRektorResource\Pages;

use App\Filament\Resources\WakilRektorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWakilRektors extends ListRecords
{
    protected static string $resource = WakilRektorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
