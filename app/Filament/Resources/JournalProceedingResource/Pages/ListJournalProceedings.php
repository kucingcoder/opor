<?php

namespace App\Filament\Resources\JournalProceedingResource\Pages;

use App\Filament\Resources\JournalProceedingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJournalProceedings extends ListRecords
{
    protected static string $resource = JournalProceedingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
