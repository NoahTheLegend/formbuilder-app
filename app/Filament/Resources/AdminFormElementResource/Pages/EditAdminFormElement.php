<?php

namespace App\Filament\Resources\AdminFormElementResource\Pages;

use App\Filament\Resources\AdminFormElementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdminFormElement extends EditRecord
{
    protected static string $resource = AdminFormElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
