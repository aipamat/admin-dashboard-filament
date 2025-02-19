<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KataSambutanResource\Pages;
use App\Filament\Resources\KataSambutanResource\RelationManagers;
use App\Models\KataSambutan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KataSambutanResource extends Resource
{
    protected static ?string $model = KataSambutan::class;

    protected static ?string $navigationGroup = 'Data Pendukung';
    protected static ?string $navigationLabel = 'Kata Sambutan';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_pimpinan')
                ->label('Nama Pimpinan')
                ->options(function () {
                    return \App\Models\Pimpinan::whereIn('status', ['Rektor', 'Dekan'])
                        ->get()
                        ->mapWithKeys(function ($item) {
                            return [$item->id => $item->nama . ' (' . $item->status . ')'];  // Format nama dan status
                        });
                })
                ->helperText('Pilih Pembuat Kata Sambutan')
                ->placeholder('Pilih Pimpinan')
                ->required(),

                RichEditor::make('kata_sambutan')
                ->label('Kata Sambutan Pimpinan')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pimpinan.nama')
                ->label('Nama Pimpinan')
                ->wrap(),
                TextColumn::make('pimpinan.status')
                ->label('Jabatan')
                ->wrap(),
                TextColumn::make('kata_sambutan')
                ->label('Kata Sambutan')
                ->wrap()
                ->html()
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
            'index' => Pages\ListKataSambutans::route('/'),
            'create' => Pages\CreateKataSambutan::route('/create'),
            'edit' => Pages\EditKataSambutan::route('/{record}/edit'),
        ];
    }
}
