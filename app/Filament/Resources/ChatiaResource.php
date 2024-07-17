<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatiaResource\Pages;
use App\Filament\Resources\ChatiaResource\RelationManagers;
use App\Models\Chatia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChatiaResource extends Resource
{
    protected static ?string $model = Chatia::class;

    protected static ?string $navigationGroup = 'Chatbots con IA';

    protected static ?string $navigationLabel = 'Nombre Chatbot_IA', $navigationIcon = 'heroicon-o-cpu-chip';

    public static function getPluralLabel(): string
    {
        return ('Nombre para tu Chatbot con IA');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
            ->required()
            ->unique()->validationMessages(['unique' => 'El nombre ya exíste.'])
            ->maxLength(255),
            Forms\Components\Select::make('estado')->options([
                'activo' => 'activo',
                'inactivo' => 'inactivo',
            ])->required(), 
        ]);
}

public static function table(Table $table): Table
{
    return $table
    ->columns([
        Tables\Columns\TextColumn::make('name')
            ->searchable(),
        Tables\Columns\TextColumn::make('estado')
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
            'index' => Pages\ListChatias::route('/'),
            'create' => Pages\CreateChatia::route('/create'),
            'edit' => Pages\EditChatia::route('/{record}/edit'),
        ];
    }
}
