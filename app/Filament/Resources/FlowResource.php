<?php

namespace App\Filament\Resources;

use App\Models\Chatbot;


use App\Filament\Resources\FlowResource\Pages;
use App\Filament\Resources\FlowResource\RelationManagers;
use App\Models\Flow;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\Image;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextArea;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FlowResource extends Resource
{
    protected static ?string $model = Flow::class;

    protected static ?string $navigationGroup = 'Chatbots con Flujos';

    protected static ?string $navigationLabel = 'Flujos para chatbot', $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    public static function getPluralLabel(): string
    {
        return ('Flujos dinamicos para Chatbot');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([            
            Forms\Components\TextInput::make('keyword')
                ->required()               
                ->unique()->validationMessages(['unique' => 'El nombre ya exíste.'])
                ->maxLength(255),

            Forms\Components\TextArea::make('answer')
                ->required()
                ->wrap()    
                ->words(10)               
                ->maxLength(500),

            Forms\Components\Select::make('chatbots_id')
                ->options(Chatbot::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),

            Forms\Components\FileUpload::make('media_path')
                ->label('Archivo') // Etiqueta visible para el usuario
                ->hint('Seleccione un archivo para subir') // Descripción o ayuda para el campo
                ->preserveFilenames()
                ->previewable(true) // Permitir vista previa si es aplicable
                ->openable()// Almacenamiento en el disco 'public'
                ->directory('media'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('keyword')
                ->searchable(),
            Tables\Columns\TextColumn::make('answer')
                ->searchable(),
            
            Tables\Columns\TextColumn::make('media_path')
                ->label('Archivo') // Etiqueta opcional para la columna
                ->searchable(),
                Tables\Columns\TextColumn::make('media_url')
                ->label('Archivo') // Etiqueta opcional para la columna
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
            'index' => Pages\ListFlows::route('/'),
            'create' => Pages\CreateFlow::route('/create'),
            'edit' => Pages\EditFlow::route('/{record}/edit'),
        ];
    }
}
