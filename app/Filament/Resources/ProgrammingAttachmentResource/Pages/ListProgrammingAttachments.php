<?php

namespace App\Filament\Resources\ProgrammingAttachmentResource\Pages;

use App\Filament\Resources\ProgrammingAttachmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgrammingAttachments extends ListRecords
{
    protected static string $resource = ProgrammingAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
