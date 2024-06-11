<?php

namespace App\Filament\Resources\LineResource\Pages;

use App\Filament\Resources\LineResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLines extends ManageRecords
{
    protected static string $resource = LineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
