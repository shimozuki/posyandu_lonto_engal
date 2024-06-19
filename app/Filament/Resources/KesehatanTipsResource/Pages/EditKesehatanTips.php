<?php

namespace App\Filament\Resources\KesehatanTipsResource\Pages;

use App\Filament\Resources\KesehatanTipsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKesehatanTips extends EditRecord
{
    protected static string $resource = KesehatanTipsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
