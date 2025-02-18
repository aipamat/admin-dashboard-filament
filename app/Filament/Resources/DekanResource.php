<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DekanResource\Pages;
use App\Filament\Resources\DekanResource\RelationManagers;
use App\Models\Dekan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DekanResource extends Resource
{
    protected static ?string $model = Dekan::class;
    
    protected static ?string $navigationGroup = 'Pimpinan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto_dekan')->required(),
                Forms\Components\Select::make('status')
                ->options([
                    'Dekan' => 'Dekan'
                ])
                ->required(),
                Forms\Components\TextInput::make('nama_dekan')->required(),
                Forms\Components\TextArea::make('kata_sambutan')->nullable()    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_dekan'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('nama_dekan'),
                Tables\Columns\TextColumn::make('kata_sambutan')
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
            'index' => Pages\ListDekans::route('/'),
            'create' => Pages\CreateDekan::route('/create'),
            'edit' => Pages\EditDekan::route('/{record}/edit'),
        ];
    }
}
