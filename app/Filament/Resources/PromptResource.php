<?php

namespace App\Filament\Resources;

use App\Models\Chatia;
use App\Filament\Resources\PromptResource\Pages;
use App\Filament\Resources\PromptResource\RelationManagers;
use App\Models\Prompt;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextArea;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromptResource extends Resource
{
    protected static ?string $model = Prompt::class;

    protected static ?string $navigationGroup = 'Chatbots con IA';

    protected static ?string $navigationLabel = 'Prompts para IA', $navigationIcon = 'heroicon-o-document-text';

    public static function getPluralLabel(): string
    {
        return ('Prompts para entrenar la IA');
    }

    //oculta el boton de crear si ya existe mas de 3 registro en la tabla
    public static function canCreate(): bool
    {
        return Prompt::count() === 2;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('prompt_type')->options([
                    'ENTRENAR_BOT' => 'ENTRENAR_BOT',
                    'INFO_NEGOCIO' => 'INFO_NEGOCIO',
                     ])->required(),

                Forms\Components\TextArea::make('content')
                    ->maxLength(8000)
                    ->required(),            
                
                Forms\Components\Select::make('chatias_id')
                    ->options(Chatia::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('prompt_type')
                ->searchable(),
            Tables\Columns\TextColumn::make('content')
                ->wrap()    
                ->words(20)
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
            'index' => Pages\ListPrompts::route('/'),
            'create' => Pages\CreatePrompt::route('/create'),
            'edit' => Pages\EditPrompt::route('/{record}/edit'),
        ];
    }
}
