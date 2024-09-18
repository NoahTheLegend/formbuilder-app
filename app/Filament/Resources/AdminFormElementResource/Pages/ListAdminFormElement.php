<?php

namespace App\Filament\Resources\AdminFormElementResource\Pages;

use App\Filament\Resources\AdminFormElementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminFormElement extends ListRecords
{
    protected static string $resource = AdminFormElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
