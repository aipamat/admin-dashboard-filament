<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderTeksResource\Pages;
use App\Filament\Resources\SliderTeksResource\RelationManagers;
use App\Models\SliderTeks;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderTeksResource extends Resource
{
    protected static ?string $model = SliderTeks::class;

    protected static ?string $navigationGroup = 'Beranda';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slider_teks')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slider_teks')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliderTeks::route('/'),
            'create' => Pages\CreateSliderTeks::route('/create'),
            'edit' => Pages\EditSliderTeks::route('/{record}/edit'),
        ];
    }
}
