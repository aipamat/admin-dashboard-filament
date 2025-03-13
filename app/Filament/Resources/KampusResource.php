<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KampusResource\Pages;
use App\Filament\Resources\KampusResource\RelationManagers;
use App\Models\Kampus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KampusResource extends Resource
{
    protected static ?string $model = Kampus::class;

    protected static ?string $navigationGroup = 'Fasilitas';
    protected static ?string $navigationLabel = 'Daftar Kampus';

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('banner_utama')
                ->label('Banner Halaman Utama')
                ->helperText('Harus ukuran (1920x526).')
                ->image()
                ->columnSpan(2)
                ->required(),
                TextArea::make('deskripsi')
                ->label('Deskripsi')
                ->placeholder('Cth: Kampus kami menawarkan pendidikan berkualitas dengan fasilitas terbaik, untuk membantu Anda mencapai tujuan akademik dan profesional.')
                ->helperText('Maks. 150 Karakter.')
                ->columnSpan(2)
                ->autosize()
                ->minLength(5)
                ->maxLength(150)
                ->required(),
                FileUpload::make('gambar_kampus')
                ->label('Gambar Kampus')
                ->helperText('Harus ukuran (1920x526).')
                ->image()
                ->columnSpan(2)
                ->required(),
                TextInput::make('nama_kampus')
                ->label('Nama Kampus')
                ->placeholder('Kampus 1 : International Women University')    
                ->helperText('Maks. 70 Karakter.')
                ->columnSpan(2)
                ->minLength(5)
                ->maxLength(70)
                ->required(),
                TextArea::make('alamat')
                ->label('Alamat')
                ->placeholder('Jln. Otista GG. Kebon Karet No.29/5-C')
                ->helperText('Maks. 150 Karakter.')
                ->columnSpan(2)
                ->autosize()
                ->minLength(5)
                ->maxLength(150)
                ->required(),
                Select::make('id_fasilitas')
                ->label('Nama Fasilitas')
                ->relationship('fasilitas', 'nama_fasilitas')
                ->helperText('Pilih Fasilitas Sesuai Dengan Kampus')
                ->placeholder('Pilih Fasilitas')                
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('banner_utama')
                ->label('Banner'),
                TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->wrap(),
                ImageColumn::make('gambar_kampus')
                ->label('Gambar Kampus'),
                TextColumn::make('nama_kampus')
                ->label('Nama Kampus')
                ->wrap(),
                TextColumn::make('alamat')
                ->label('Alamat')
                ->wrap(),
                TextColumn::make('fasilitas.nama_fasilitas')
                ->label('Nama Fasilitas')
                ->wrap(),
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
            'index' => Pages\ListKampuses::route('/'),
            'create' => Pages\CreateKampus::route('/create'),
            'edit' => Pages\EditKampus::route('/{record}/edit'),
        ];
    }
}
