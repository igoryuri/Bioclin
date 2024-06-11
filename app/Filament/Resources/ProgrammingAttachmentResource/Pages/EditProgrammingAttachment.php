<?php

namespace App\Filament\Resources\ProgrammingAttachmentResource\Pages;

use App\Filament\Resources\ProgrammingAttachmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgrammingAttachment extends EditRecord
{
    protected static string $resource = ProgrammingAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
