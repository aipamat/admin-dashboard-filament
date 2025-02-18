<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KerjaSamaResource\Pages;
use App\Filament\Resources\KerjaSamaResource\RelationManagers;
use App\Models\KerjaSama;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KerjaSamaResource extends Resource
{
    protected static ?string $model = KerjaSama::class;

    protected static ?string $navigationGroup = 'Tentang Kampus';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar_kerja_sama')->required(),
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextArea::make('deskripsi')->required(),
                Forms\Components\DatePicker::make('tanggal')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar_kerja_sama'),
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('tanggal')
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
            'index' => Pages\ListKerjaSamas::route('/'),
            'create' => Pages\CreateKerjaSama::route('/create'),
            'edit' => Pages\EditKerjaSama::route('/{record}/edit'),
        ];
    }
}
