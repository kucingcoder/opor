<?php

namespace App\Filament\Resources\CertificateCategoryResource\Pages;

use App\Filament\Resources\CertificateCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertificateCategories extends ListRecords
{
    protected static string $resource = CertificateCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
