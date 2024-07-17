<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{

    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Admin';

    protected static ?string $navigationLabel = 'Usuarios', $navigationIcon = 'heroicon-o-users';

    public static function getPluralLabel(): string
    {
        return ('Usuarios con roles y permisos');
    }
        
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
        Forms\Components\TextInput::make('name')
            ->required(),
            Forms\Components\TextInput::make('password')
            ->required()
            ->password(),
            Forms\Components\TextInput::make('email')
            ->email()
            ->unique()->validationMessages(['unique' => 'El nombre ya exíste.']),
        Forms\Components\Select::make('roles')
                ->relationship('roles', 'name')
                ->multiple()
                ->preload()
                ->searchable(),
                Forms\Components\Select::make('teams')
                ->relationship('teams', 'name')
                ->multiple()
                ->preload()
                ->searchable()                            
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                ->date()
                ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                ->date()
                ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                ->label('Roles')
                ->searchable()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
   
}
