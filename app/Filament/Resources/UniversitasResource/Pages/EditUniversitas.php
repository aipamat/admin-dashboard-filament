<?php

namespace App\Filament\Resources\UniversitasResource\Pages;

use App\Filament\Resources\UniversitasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUniversitas extends EditRecord
{
    protected static string $resource = UniversitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
