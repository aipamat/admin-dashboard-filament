<?php

namespace App\Filament\Resources\TeksIklanResource\Pages;

use App\Filament\Resources\TeksIklanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeksIklan extends EditRecord
{
    protected static string $resource = TeksIklanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
