<?php

namespace App\Filament\Resources\ManagementOfSitesResource\Pages;

use App\Filament\Resources\ManagementOfSitesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManagementOfSites extends EditRecord
{
    protected static string $resource = ManagementOfSitesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
