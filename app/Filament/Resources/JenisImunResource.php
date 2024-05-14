<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisImunResource\Pages;
use App\Filament\Resources\JenisImunResource\RelationManagers;
use App\Models\JenisImun;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisImunResource extends Resource
{
    protected static ?string $model = JenisImun::class;

    protected static ?string $navigationLabel = 'Jenis Imunisasi';

    protected static ?string $navigationIcon = 'heroicon-s-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_imun')
                    ->label('Nama Imunisasi')
                    ->required()
                    ->placeholder('Masukkan Nama Imunisasi')
                    ->maxLength(30)
                    ->columnSpan(1),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->placeholder('Masukkan Deskripsi Imunisasi')
                    ->maxLength(65535)
                    ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_imun')
                    ->label('Nama Imunisasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada data')
            ->emptyStateDescription('')
            ->emptyStateActions([
                Tables\Actions\Action::make('create')
                    ->label('Tambah Jenis Imunisasi')
                    ->url(route('filament.admin.resources.jenis-imuns.create'))
                    ->icon('heroicon-m-plus')
                    ->button(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJenisImuns::route('/'),
            'create' => Pages\CreateJenisImun::route('/create'),
            'edit' => Pages\EditJenisImun::route('/{record}/edit'),
        ];
    }
}
