<?php

namespace App\Filament\Resources\FakultasDisplayResource\Pages;

use App\Filament\Resources\FakultasDisplayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFakultasDisplays extends ListRecords
{
    protected static string $resource = FakultasDisplayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
