<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BerandaResource\Pages;
use App\Filament\Resources\BerandaResource\RelationManagers;
use App\Models\Beranda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BerandaResource extends Resource
{
    protected static ?string $model = Beranda::class;


    protected static ?string $navigationGroup = 'Beranda';
    protected static ?string $navigationLabel = 'Banner, dan Dekorasi Gambar';

    protected static ?string $navigationIcon = 'heroicon-o-view-columns';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('banner')
                ->label('Banner Halaman Utama')
                ->helperText('Harus ukuran (1920x1100).')
                ->image()
                ->columnSpan(2)
                ->required(),
                FileUpload::make('gambar_dekorasi_besar')
                ->label('Gambar Dekorasi Besar')
                ->helperText('Harus ukuran (480x575).')
                ->image()
                ->required(),
                FileUpload::make('gambar_dekorasi_kecil')
                ->label('Banner Dekorasi Kecil')
                ->helperText('Harus ukuran (375x375).')
                ->image()
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('banner')
                ->label('Banner'),
                ImageColumn::make('gambar_dekorasi_besar')
                ->label('Gambar Dekorasi Besar'),
                ImageColumn::make('gambar_dekorasi_kecil')
                ->label('Gambar Dekorasi Kecil'),
                TextColumn::make('created_at')
                ->label('Waktu Dibuat')
                ->dateTime('d-m-Y H:i')
                ->timezone('Asia/Jakarta')
                ->sortable()
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
