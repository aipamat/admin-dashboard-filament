<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangKampusResource\Pages;
use App\Filament\Resources\TentangKampusResource\RelationManagers;
use App\Models\TentangKampus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TentangKampusResource extends Resource
{
    protected static ?string $model = TentangKampus::class;

    protected static ?string $navigationGroup = 'Tentang Kampus';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('banner_tentang_kampus')->required(),
                Forms\Components\TextArea::make('deskripsi')->required(),
                Forms\Components\TextInput::make('visi')->required(),
                Forms\Components\TextInput::make('misi')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('banner_tentang_kampus'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('visi'),
                Tables\Columns\TextColumn::make('misi')
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
            'index' => Pages\ListTentangKampuses::route('/'),
            'create' => Pages\CreateTentangKampus::route('/create'),
            'edit' => Pages\EditTentangKampus::route('/{record}/edit'),
        ];
    }
}
