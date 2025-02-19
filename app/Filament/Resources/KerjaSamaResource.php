<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KerjaSamaResource\Pages;
use App\Filament\Resources\KerjaSamaResource\RelationManagers;
use App\Models\KerjaSama;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KerjaSamaResource extends Resource
{
    protected static ?string $model = KerjaSama::class;

    protected static ?string $navigationGroup = 'Tentang Kampus';
    protected static ?string $navigationLabel = 'Kerja Sama';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('gambar')
                ->label('Gambar Mitra')
                ->helperText('Harus ukuran (600x742).')
                ->image()
                ->columnSpan(2)
                ->required(),
                TextInput::make('nama')
                ->label('Nama Mitra')
                ->helperText('Maks. 50 Karakter.')
                ->columnSpan(2)
                ->minLength(5)
                ->maxLength(50)
                ->required(),
                RichEditor::make('deskripsi')
                ->label('Tujuan')
                ->helperText('Tidak ada batasan panjang karakter.')
                ->minLength(5)
                ->toolbarButtons([
                    'attachFiles',
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ])
                ->columnSpan(2)
                ->required(),
                DatePicker::make('tanggal')
                ->label('Tanggal, Bulan, dan Tahun Kerja Sama')
                ->native(false)
                ->columnSpan(2)
                ->timezone('Asia/Jakarta')
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                ->label('Gambar Mitra'),
                TextColumn::make('nama')
                ->label('Nama Mitra')
                ->wrap(),
                TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->wrap()
                ->html(),
                TextColumn::make('tanggal')
                ->label('Tanggal Kerja Sama')
                ->wrap()
                ->sortable(),
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
            'index' => Pages\ListKerjaSamas::route('/'),
            'create' => Pages\CreateKerjaSama::route('/create'),
            'edit' => Pages\EditKerjaSama::route('/{record}/edit'),
        ];
    }
}
