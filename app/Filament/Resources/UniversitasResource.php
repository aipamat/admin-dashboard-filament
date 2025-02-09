<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UniversitasResource\Pages;
use App\Filament\Resources\UniversitasResource\RelationManagers;
use App\Models\Universitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UniversitasResource extends Resource
{
    protected static ?string $model = Universitas::class;

    protected static ?string $navigationGroup = 'Website Kampus';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_universitas')->required(),
                Forms\Components\TextArea::make('visi')->required(),
                Forms\Components\TextArea::make('misi')->required(),
                Forms\Components\TextArea::make('alamat')->required(),
                Forms\Components\TextInput::make('kontak')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_universitas'),
                Tables\Columns\TextColumn::make('visi'),
                Tables\Columns\TextColumn::make('misi'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('kontak')
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
            'index' => Pages\ListUniversitas::route('/'),
            'create' => Pages\CreateUniversitas::route('/create'),
            'edit' => Pages\EditUniversitas::route('/{record}/edit'),
        ];
    }
}
