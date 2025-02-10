<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeasiswaResource\Pages;
use App\Filament\Resources\BeasiswaResource\RelationManagers;
use App\Models\Beasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeasiswaResource extends Resource
{
    protected static ?string $model = Beasiswa::class;

    protected static ?string $navigationGroup = 'Website Kampus';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar_beasiswa')
                ->required()
                ->imagePreviewHeight('250'),
                Forms\Components\TextInput::make('nama_beasiswa')->required(),
                Forms\Components\TextArea::make('deskripsi')->required(),
                Forms\Components\TextArea::make('persyaratan')->required(),
                Forms\Components\TextArea::make('prosedur')->required()    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar_beasiswa')
                ->url(fn ($record) => asset('storage/' . $record->gambar_beasiswa)),
                Tables\Columns\TextColumn::make('nama_beasiswa'),
                Tables\Columns\TextColumn::make('deskripsi'),
                Tables\Columns\TextColumn::make('persyaratan'),
                Tables\Columns\TextColumn::make('prosedur'),
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
            'index' => Pages\ListBeasiswas::route('/'),
            'create' => Pages\CreateBeasiswa::route('/create'),
            'edit' => Pages\EditBeasiswa::route('/{record}/edit'),
        ];
    }

    public function saveFile($file)
{
    $image = Image::make($file);
    $image->resize(800, 600); // Resize to a reasonable size
    $image->save(storage_path('app/public/' . $file->hashName()));

    return $file->hashName();
}
}
