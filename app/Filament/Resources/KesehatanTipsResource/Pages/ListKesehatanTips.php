<?php

namespace App\Filament\Resources\KesehatanTipsResource\Pages;

use App\Filament\Resources\KesehatanTipsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKesehatanTips extends ListRecords
{
    protected static string $resource = KesehatanTipsResource::class;

    protected static ?string $title = 'Data Tip Kesehatan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah'),
        ];
    }
}
