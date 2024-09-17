<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmittedFormsResource\Pages;
use App\Filament\Resources\SubmittedFormsResource\RelationManagers;
use App\Models\SubmittedForms;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubmittedFormsResource extends Resource
{
    protected static ?string $model = SubmittedForms::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('first_name')->label('First Name'),
                TextColumn::make('last_name')->label('Last name'),
                TextColumn::make('photo')->label('Photo'),
                TextColumn::make('comment')->label('Comment')->limit(50),
                TextColumn::make('created_at')->label('Submitted at')->sortable(),
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
            'index' => Pages\ListSubmittedForms::route('/'),
            'create' => Pages\CreateSubmittedForms::route('/create'),
            'edit' => Pages\EditSubmittedForms::route('/{record}/edit'),
        ];
    }
}
