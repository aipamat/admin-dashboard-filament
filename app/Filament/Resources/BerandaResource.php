<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BerandaResource\Pages;
use App\Filament\Resources\BerandaResource\RelationManagers;
use App\Models\Beranda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BerandaResource extends Resource
{
    protected static ?string $model = Beranda::class;

    protected static ?string $navigationGroup = 'Beranda';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('slider')->required(),
                Forms\Components\FileUpload::make('gambar_dekor1')->required(),
                Forms\Components\FileUpload::make('gambar_dekor2')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('slider'),
                Tables\Columns\ImageColumn::make('gambar_dekor1'),
                Tables\Columns\ImageColumn::make('gambar_dekor2'),
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
            'index' => Pages\ListBerandas::route('/'),
            'create' => Pages\CreateBeranda::route('/create'),
            'edit' => Pages\EditBeranda::route('/{record}/edit'),
        ];
    }
}
