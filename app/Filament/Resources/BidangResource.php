<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BidangResource\Pages;
use App\Filament\Resources\BidangResource\RelationManagers;
use App\Models\Bidang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BidangResource extends Resource
{
    protected static ?string $model = Bidang::class;

    protected static ?string $navigationLabel = 'Bidang';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('bidang')
                ->label('Nama Bidang')
                ->helperText('Maks. 100 Karakter.')
                ->minLength(5)
                ->maxLength(100)
                ->required()
                ->unique(),
               
                Select::make('id_pimpinan')
                ->label('Nama Pimpinan')
                ->relationship('pimpinan', 'nama', function ($query) {
                    return $query->where('status', 'Wakil Rektor');
                })
                ->helperText('Pilih Pimpinan Sesuai Bidang')
                ->placeholder('Pilih Pimpinan')
                ->unique()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bidang')
                ->label('Nama Bidang')
                ->wrap(),
                TextColumn::make('pimpinan.nama')
                ->label('Nama Pimpinan')
                ->wrap(),
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
            'index' => Pages\ListBidangs::route('/'),
            'create' => Pages\CreateBidang::route('/create'),
            'edit' => Pages\EditBidang::route('/{record}/edit'),
        ];
    }
}
