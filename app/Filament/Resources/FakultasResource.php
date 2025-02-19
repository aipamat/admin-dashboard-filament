<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FakultasResource\Pages;
use App\Filament\Resources\FakultasResource\RelationManagers;
use App\Models\Fakultas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextArea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FakultasResource extends Resource
{
    protected static ?string $model = Fakultas::class;

    protected static ?string $navigationGroup = 'Fakultas & Program Studi';
    protected static ?string $navigationLabel = 'Fakultas';

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_fakultas')
                ->label('Nama Fakultas')
                ->helperText('Maks. 100 Karakter.')
                ->minLength(5)
                ->maxLength(100)
                ->required(),
                Select::make('id_pimpinan')
                ->label('Nama Pimpinan Fakultas')
                ->relationship('pimpinan', 'nama', function ($query) {
                    return $query->where('status', 'Dekan');
                })
                ->helperText('Pilih Pimpinan Sesuai Dengan Fakultas')
                ->placeholder('Pilih Pimpinan Fakultas')
                ->required(),
                FileUpload::make('banner')
                ->label('Banner Halaman Utama')
                ->helperText('Harus ukuran (1920x525).')
                ->image()
                ->columnSpan(2)
                ->required(),
                FileUpload::make('display')
                ->label('Display Gambar Kecil')
                ->helperText('Harus ukuran (700x450).')
                ->image()
                ->columnSpan(2)
                ->required(),
                TextArea::make('deskripsi')
                ->label('Deskripsi')
                ->placeholder('Cth: Selamat datang di Fakultas kami, tempat di mana inovasi, ilmu pengetahuan, dan pengembangan diri bertemu untuk menciptakan masa depan yang lebih baik.')
                ->helperText('Maks. 150 Karakter.')
                ->columnSpan(2)
                ->autosize()
                ->minLength(5)
                ->maxLength(150)
                ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('banner')
                ->label('Banner'),
                ImageColumn::make('display')
                ->label('Display Gambar'),
                TextColumn::make('nama_fakultas')
                ->label('Nama Fakultas')
                ->wrap(),
                TextColumn::make('pimpinan.nama')
                ->label('Nama Pimpinan')
                ->wrap(),
                TextColumn::make('deskripsi')
                ->label('Deskripsi')
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
            'index' => Pages\ListFakultas::route('/'),
            'create' => Pages\CreateFakultas::route('/create'),
            'edit' => Pages\EditFakultas::route('/{record}/edit'),
        ];
    }
}
