<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiTujuanResource\Pages;
use App\Filament\Resources\VisiMisiTujuanResource\RelationManagers;
use App\Models\VisiMisiTujuan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisiMisiTujuanResource extends Resource
{
    protected static ?string $model = VisiMisiTujuan::class;

    protected static ?string $navigationGroup = 'Tentang Kampus';
    protected static ?string $navigationLabel = 'Visi, Misi, dan Tujuan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('visi')
                ->label('Visi')
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

                RichEditor::make('misi')
                ->label('Misi')
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

                RichEditor::make('tujuan')
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
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('visi')
                ->label('Visi')
                ->wrap()
                ->html(),
                TextColumn::make('misi')
                ->label('Misi')
                ->wrap()
                ->html(),
                TextColumn::make('tujuan')
                ->label('Tujuan')
                ->wrap()
                ->html(),
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
            'index' => Pages\ListVisiMisiTujuans::route('/'),
            'create' => Pages\CreateVisiMisiTujuan::route('/create'),
            'edit' => Pages\EditVisiMisiTujuan::route('/{record}/edit'),
        ];
    }
}
