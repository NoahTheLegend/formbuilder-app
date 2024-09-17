<?php

namespace App\Filament\Resources\SubmittedFormsResource\Pages;

use App\Filament\Resources\SubmittedFormsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubmittedForms extends ListRecords
{
    protected static string $resource = SubmittedFormsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
