<?php

namespace App\Filament\Resources\SliderTeksResource\Pages;

use App\Filament\Resources\SliderTeksResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliderTeks extends ListRecords
{
    protected static string $resource = SliderTeksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
