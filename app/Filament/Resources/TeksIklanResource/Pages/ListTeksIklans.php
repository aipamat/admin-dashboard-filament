<?php

namespace App\Filament\Resources\TeksIklanResource\Pages;

use App\Filament\Resources\TeksIklanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeksIklans extends ListRecords
{
    protected static string $resource = TeksIklanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
