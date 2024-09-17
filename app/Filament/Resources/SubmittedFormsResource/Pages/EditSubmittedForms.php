<?php

namespace App\Filament\Resources\SubmittedFormsResource\Pages;

use App\Filament\Resources\SubmittedFormsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubmittedForms extends EditRecord
{
    protected static string $resource = SubmittedFormsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
