<?php

namespace App\Filament\Resources\RedirectionResource\Pages;

use App\Filament\Resources\RedirectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRedirections extends ListRecords
{
    protected static string $resource = RedirectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
