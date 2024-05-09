<?php

namespace App\Filament\Resources\VictimResource\Pages;

use App\Filament\Resources\VictimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVictim extends EditRecord
{
    protected static string $resource = VictimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
