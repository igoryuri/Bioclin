<?php

namespace App\Filament\Resources\TypeAttachmentResource\Pages;

use App\Filament\Resources\TypeAttachmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeAttachments extends ListRecords
{
    protected static string $resource = TypeAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
