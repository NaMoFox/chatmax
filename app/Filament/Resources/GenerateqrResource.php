<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GenerateqrResource\Pages;
use App\Filament\Resources\GenerateqrResource\RelationManagers;
use App\Models\Generateqr;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\Image;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class GenerateqrResource extends Resource
{
    protected static ?string $model = Generateqr::class;

    protected static ?string $navigationGroup = 'Lanza tu Chatbot';

    protected static ?string $navigationLabel = 'Generar QR', $navigationIcon = 'heroicon-o-qr-code';

    public static function getPluralLabel(): string
    {
        return ('QR para iniciar session con Whatsapp');
    }

    //oculta el boton de crear si ya existe un registro en la tabla
    public static function canCreate(): bool
    {
        return Generateqr::count() === 0;
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
            ->required()       
            ->unique()->validationMessages(['unique' => 'El nombre ya exíste.'])        
            ->maxLength(255),

        ]);
}  

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
        
            Tables\Columns\ImageColumn::make('bot_qr')
                ->width(375)
                ->height(375)
        ])
        ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListGenerateqrs::route('/'),
            'create' => Pages\CreateGenerateqr::route('/create'),
            'edit' => Pages\EditGenerateqr::route('/{record}/edit'),
        ];
    }
}
