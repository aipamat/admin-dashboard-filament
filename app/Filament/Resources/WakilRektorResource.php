<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WakilRektorResource\Pages;
use App\Filament\Resources\WakilRektorResource\RelationManagers;
use App\Models\WakilRektor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WakilRektorResource extends Resource
{
    protected static ?string $model = WakilRektor::class;

    protected static ?string $navigationGroup = 'Pimpinan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto_wakil_rektor')->required(),
                Forms\Components\Select::make('status')
                ->options([
                    'Wakil Rektor' => 'Wakil Rektor'
                ])
                ->required(),
                Forms\Components\TextInput::make('bidang')->required(),
                Forms\Components\TextInput::make('nama_wakil_rektor')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_wakil_rektor'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('bidang'),
                Tables\Columns\TextColumn::make('nama_wakil_rektor')
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
            'index' => Pages\ListWakilRektors::route('/'),
            'create' => Pages\CreateWakilRektor::route('/create'),
            'edit' => Pages\EditWakilRektor::route('/{record}/edit'),
        ];
    }
}
