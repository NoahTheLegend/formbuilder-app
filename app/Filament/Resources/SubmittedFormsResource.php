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
use Filament\Forms\Components\TextInput;

class SubmittedFormsResource extends Resource
{
    protected static ?string $model = SubmittedForms::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(function () {
                $submittedForm = SubmittedForms::find(request()->route('record'));
                
                if ($submittedForm && !is_null($submittedForm->form_data)) {
                    $formData = json_decode($submittedForm->form_data, true);
                } else {
                    $formData = [];
                }

                $dynamicSchema = [];

                if (!empty($formData)) {
                    foreach ($formData as $key => $value) {
                        $dynamicSchema[] = TextInput::make($key)
                            ->label(ucfirst($key))
                            ->placeholder($value) // hack? default() does not work
                            ->required();
                    }
                }
    
                return $dynamicSchema;
            });
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('form_data')->label('Form')->sortable(),
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
