<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramStudiResource\Pages;
use App\Filament\Resources\ProgramStudiResource\RelationManagers;
use App\Models\ProgramStudi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramStudiResource extends Resource
{
    protected static ?string $model = ProgramStudi::class;

    protected static ?string $navigationGroup = 'Fakultas & Program Studi';
    protected static ?string $navigationLabel = 'Program Studi';

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->label('Nama Program Studi')
                ->helperText('Maks. 50 Karakter.')
                ->minLength(5)
                ->maxLength(50)
                ->required(),
                Select::make('id_fakultas')
                ->label('Nama Fakultas')
                ->relationship('fakultas', 'nama_fakultas')
                ->helperText('Pilih Fakultas Sesuai Dengan Program Studi')
                ->placeholder('Pilih Fakultas Dari Program Studi')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Program Studi')
                ->wrap(),
                TextColumn::make('fakultas.nama_fakultas')
                ->label('Fakultas')
                ->wrap(),
                TextColumn::make('fakultas.pimpinan.nama')
                ->label('Nama Pimpinan')
                ->wrap()
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
            'index' => Pages\ListProgramStudis::route('/'),
            'create' => Pages\CreateProgramStudi::route('/create'),
            'edit' => Pages\EditProgramStudi::route('/{record}/edit'),
        ];
    }
}
