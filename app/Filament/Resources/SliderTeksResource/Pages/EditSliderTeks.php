<?php

namespace App\Filament\Resources\SliderTeksResource\Pages;

use App\Filament\Resources\SliderTeksResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSliderTeks extends EditRecord
{
    protected static string $resource = SliderTeksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
