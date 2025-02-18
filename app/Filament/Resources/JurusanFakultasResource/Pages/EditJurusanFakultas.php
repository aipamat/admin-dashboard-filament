<?php

namespace App\Filament\Resources\JurusanFakultasResource\Pages;

use App\Filament\Resources\JurusanFakultasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJurusanFakultas extends EditRecord
{
    protected static string $resource = JurusanFakultasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
