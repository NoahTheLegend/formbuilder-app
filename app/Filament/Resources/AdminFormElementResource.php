<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminFormElementResource\Pages;
use App\Filament\Resources\AdminFormElementResource\RelationManagers;
use App\Models\AdminFormElement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminFormElementResource extends Resource
{
    protected static ?string $model = AdminFormElement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('element_data.label')->required(),
                TextInput::make('element_data.name')->required(),
                Select::make('element_data.type')
                    ->options([
                        'text' => 'Text',
                        'email' => 'Email',
                        'tel' => 'Phone',
                    ])->required(),
                Toggle::make('element_data.is_required')->label('Required'),
                Textarea::make('element_data.validation_regex')
                    ->label('Validation regular expression'),
                Toggle::make('element_data.is_active')->label('Active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(), // todo, fix column params, for some reason it can not insert (an existing) json property
                TextColumn::make('element_data["label"]')->label('Label')->sortable(),
                TextColumn::make('element_data["name"]')->label('Name')->sortable(),
                TextColumn::make('element_data["type"]')->label('Type')->sortable(),
                IconColumn::make('element_data["is_required"]')->label('Required'),
                IconColumn::make('element_data["is_active"]')->label('Active'),
                TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListAdminFormElement::route('/'),
            'create' => Pages\CreateAdminFormElement::route('/create'),
            'edit' => Pages\EditAdminFormElement::route('/{record}/edit'),
        ];
    }
}
