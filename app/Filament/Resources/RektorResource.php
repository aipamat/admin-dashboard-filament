<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RektorResource\Pages;
use App\Filament\Resources\RektorResource\RelationManagers;
use App\Models\Rektor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RektorResource extends Resource
{
    protected static ?string $model = Rektor::class;

    protected static ?string $navigationGroup = 'Pimpinan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto_rektor')->required(),
                Forms\Components\Select::make('status')
                ->options([
                    'Rektor' => 'Rektor'
                ])
                ->required(),
                Forms\Components\TextInput::make('nama_rektor')->required(),
                Forms\Components\TextArea::make('kata_sambutan')->nullable()    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_rektor'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('nama_rektor'),
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
            'index' => Pages\ListRektors::route('/'),
            'create' => Pages\CreateRektor::route('/create'),
            'edit' => Pages\EditRektor::route('/{record}/edit'),
        ];
    }
}
