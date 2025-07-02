<?php

namespace App\Filament\Resources\ManagementOfSitesResource\Pages;

use App\Filament\Resources\ManagementOfSitesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListManagementOfSites extends ListRecords
{
    protected static string $resource = ManagementOfSitesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
