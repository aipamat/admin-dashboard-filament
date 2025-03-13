<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitasResource\Pages;
use App\Filament\Resources\FasilitasResource\RelationManagers;
use App\Models\Fasilitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationGroup = 'Fasilitas';
    protected static ?string $navigationLabel = 'Fasilitas';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('gambar_fasilitas')
                ->label('Gambar Fasilitas')
                ->helperText('Harus ukuran (1920x526).')
                ->image()
                ->columnSpan(2)
                ->required(),
                TextInput::make('nama_fasilitas')
                ->label('Nama Fasilitas')
                ->placeholder('Masukan nama fasilitas')    
                ->helperText('Maks. 70 Karakter.')
                ->columnSpan(2)
                ->minLength(5)
                ->maxLength(70)
                ->required(),
                RichEditor::make('deskripsi')
                ->label('Deskripsi Fasilitas')
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
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar_fasilitas')
                ->label('Gambar'),
                TextColumn::make('nama_fasilitas')
                ->label('Nama Fasilitas')
                ->wrap(),
                TextColumn::make('deskripsi')
                ->label('Deskripsi Fasilitas')
                ->html()
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
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }
}
