<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClosesessionResource\Pages;
use App\Filament\Resources\ClosesessionResource\RelationManagers;
use App\Models\Closesession;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClosesessionResource extends Resource
{
    protected static ?string $model = Closesession::class;

    protected static ?string $navigationGroup = 'Admin';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralLabel(): string
    {
        return ('Cierre de Session cada 24Hrs');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([            
            Forms\Components\TextInput::make('phone_number')
            ->required()               
                ->maxLength(255),
            Forms\Components\TextInput::make('received_welcome')
                ->required()               
                ->maxLength(255),
            Forms\Components\TextInput::make('last_interaction')
                ->required()               
                ->maxLength(255)
        ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('phone_number')
            ->searchable(),
            Tables\Columns\TextColumn::make('received_welcome')
                ->searchable(),
            Tables\Columns\TextColumn::make('last_interaction')
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
            'index' => Pages\ListClosesessions::route('/'),
            'create' => Pages\CreateClosesession::route('/create'),
            'edit' => Pages\EditClosesession::route('/{record}/edit'),
        ];
    }
}
