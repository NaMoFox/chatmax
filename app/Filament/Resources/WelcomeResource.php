<?php

namespace App\Filament\Resources;


use App\Filament\Resources\WelcomeResource\Pages;
use App\Filament\Resources\WelcomeResource\RelationManagers;
use App\Models\Welcome;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\Image;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextArea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WelcomeResource extends Resource
{
    protected static ?string $model = Welcome::class;

    protected static ?string $navigationLabel = 'Mensaje de bienvenida', $navigationIcon = 'heroicon-o-hand-raised';

    public static function getPluralLabel(): string
    {
        return ('Mensaje de Bienvenida para el cliente');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextArea::make('welcomereply')
                        ->required()           
                        ->maxLength(255),
                                  
                    Forms\Components\FileUpload::make('mediaPath')
                        ->label('Archivo') // Etiqueta visible para el usuario
                        ->hint('Seleccione un archivo para subir') // Descripción o ayuda para el campo
                        ->preserveFilenames()
                        ->previewable(true) // Permitir vista previa si es aplicable
                        ->openable()// Almacenamiento en el disco 'public'
                        ->directory('media'), // Directorio 'media' dentro del disco 'public'
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('welcomereply')
             ->wrap()    
            ->words(15)       
            ->searchable(),
            Tables\Columns\TextColumn::make('mediaPath')
                ->searchable(),
            Tables\Columns\TextColumn::make('media_url')
                ->searchable(),    
                Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListWelcomes::route('/'),
            'create' => Pages\CreateWelcome::route('/create'),
            'edit' => Pages\EditWelcome::route('/{record}/edit'),
        ];
    }
}
