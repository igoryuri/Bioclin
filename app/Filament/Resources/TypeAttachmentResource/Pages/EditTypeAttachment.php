<?php

namespace App\Filament\Resources\TypeAttachmentResource\Pages;

use App\Filament\Resources\TypeAttachmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeAttachment extends EditRecord
{
    protected static string $resource = TypeAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
