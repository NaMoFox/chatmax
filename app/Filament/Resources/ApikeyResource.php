<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApikeyResource\Pages;
use App\Filament\Resources\ApikeyResource\RelationManagers;
use App\Models\Apikey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApikeyResource extends Resource
{
    protected static ?string $model = Apikey::class;

    protected static ?string $navigationGroup = 'Chatbots con IA';

    protected static ?string $navigationLabel = 'Api de IA', $navigationIcon = 'heroicon-o-key';

    public static function getPluralLabel(): string
    {
        return ('Utiliza una ApiKey de Groq.com');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([            
            Forms\Components\TextInput::make('api_key')
                ->required()
                ->unique()->validationMessages(['unique' => 'El nombre ya exíste.'])            
                ->maxLength(255)
        ]);
    }

    public static function table(Table $table): Table
    {

        return $table
        ->columns([
            Tables\Columns\TextColumn::make('api_key')
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
            'index' => Pages\ListApikeys::route('/'),
            'create' => Pages\CreateApikey::route('/create'),
            'edit' => Pages\EditApikey::route('/{record}/edit'),
        ];
    }
}
