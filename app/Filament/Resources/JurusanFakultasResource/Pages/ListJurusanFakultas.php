<?php

namespace App\Filament\Resources\JurusanFakultasResource\Pages;

use App\Filament\Resources\JurusanFakultasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJurusanFakultas extends ListRecords
{
    protected static string $resource = JurusanFakultasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
