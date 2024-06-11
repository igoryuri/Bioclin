<?php

namespace App\Filament\Resources\DescriptionResource\Pages;

use App\Filament\Resources\DescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDescription extends EditRecord
{
    protected static string $resource = DescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
