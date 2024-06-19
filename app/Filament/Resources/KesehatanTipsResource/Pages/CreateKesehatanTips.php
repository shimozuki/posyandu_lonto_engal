<?php

namespace App\Filament\Resources\KesehatanTipsResource\Pages;

use App\Filament\Resources\KesehatanTipsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKesehatanTips extends CreateRecord
{
    protected static string $resource = KesehatanTipsResource::class;

    protected static ?string $title = 'Tambah Tip Kesehatan';

    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl('index');
    }
}
