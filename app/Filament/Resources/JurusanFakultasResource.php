<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JurusanFakultasResource\Pages;
use App\Filament\Resources\JurusanFakultasResource\RelationManagers;
use App\Models\JurusanFakultas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JurusanFakultasResource extends Resource
{
    protected static ?string $model = JurusanFakultas::class;

    protected static ?string $navigationGroup = 'Fakultas';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('banner_fakultas')->required(),
                Forms\Components\FileUpload::make('gambar_fakultas')->required(),
                Forms\Components\TextInput::make('nama_fakultas')->required(),
                Forms\Components\TextArea::make('deskripsi')->required(),
                Forms\Components\Select::make('id_dekan')
                ->relationship('dekan', 'nama_dekan')
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_fakultas'),
                Tables\Columns\ImageColumn::make('gambar_fakultas'),
                Tables\Columns\TextColumn::make('nama_fakultas'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('dekan.nama_dekan')
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
            'index' => Pages\ListJurusanFakultas::route('/'),
            'create' => Pages\CreateJurusanFakultas::route('/create'),
            'edit' => Pages\EditJurusanFakultas::route('/{record}/edit'),
        ];
    }
}
