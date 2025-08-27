<?php

namespace App\Filament\Resources\ActivityGalleryResource\Pages;

use App\Filament\Resources\ActivityGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActivityGallery extends EditRecord
{
    protected static string $resource = ActivityGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
