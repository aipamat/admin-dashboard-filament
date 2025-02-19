<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeksIklanResource\Pages;
use App\Filament\Resources\TeksIklanResource\RelationManagers;
use App\Models\TeksIklan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeksIklanResource extends Resource
{
    protected static ?string $model = TeksIklan::class;

    protected static ?string $navigationGroup = 'Beranda';
    protected static ?string $navigationLabel = 'Teks Iklan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kata_iklan')
                ->label('Teks Iklan')
                ->placeholder('Kata-kata yang mengandung iklan..')    
                ->helperText('Maks. 70 Karakter.')
                ->columnSpan(2)
                ->minLength(5)
                ->maxLength(70)
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kata_iklan')
                ->label('Teks Iklan')
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
            'index' => Pages\ListTeksIklans::route('/'),
            'create' => Pages\CreateTeksIklan::route('/create'),
            'edit' => Pages\EditTeksIklan::route('/{record}/edit'),
        ];
    }
}
