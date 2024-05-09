<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VictimResource\Pages;
use App\Filament\Resources\VictimResource\RelationManagers;
use App\Models\Victim;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;

class VictimResource extends Resource
{
    protected static ?string $model = Victim::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')->required(),
                TextInput::make('documento')->required(),
                TextInput::make('idade')->required(),
                TextInput::make('data_de_nascimento')->required(),
                Select::make('genero')->options([
                    'Masculino',
                    'Feminino',
                    'Outro'
                ])->required(),
                TextInput::make('cidade')->required(),
                TextInput::make('endereco')->required(),
                TextInput::make('familiar_em_outro_abrigo')->nullable(),
                TextInput::make('nome_do_primeiro_abrigo')->nullable(),
                TextInput::make('observacao')->nullable(),
                TextInput::make('nome_do_voluntario')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome'),
                TextColumn::make('documento'),
                TextColumn::make('idade'),
                TextColumn::make('cidade'),
                TextColumn::make('familiar_em_outro_abrigo'),
                TextColumn::make('observacao'),
                TextColumn::make('nome_do_voluntario'),
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
            'index' => Pages\ListVictims::route('/'),
            'create' => Pages\CreateVictim::route('/create'),
            'edit' => Pages\EditVictim::route('/{record}/edit'),
        ];
    }
}
