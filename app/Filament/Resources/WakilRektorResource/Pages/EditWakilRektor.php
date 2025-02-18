<?php

namespace App\Filament\Resources\WakilRektorResource\Pages;

use App\Filament\Resources\WakilRektorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWakilRektor extends EditRecord
{
    protected static string $resource = WakilRektorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
