<?php

namespace App\Filament\Resources\TentangKampusResource\Pages;

use App\Filament\Resources\TentangKampusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTentangKampus extends EditRecord
{
    protected static string $resource = TentangKampusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
