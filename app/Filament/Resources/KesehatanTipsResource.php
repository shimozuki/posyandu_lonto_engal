<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KesehatanTipsResource\Pages;
use App\Filament\Resources\KesehatanTipsResource\RelationManagers;
use App\Models\KesehatanTips;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KesehatanTipsResource extends Resource
{
    protected static ?string $model = KesehatanTips::class;

    protected static ?string $navigationLabel = 'Tips Kesehatan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->placeholder('Masukkan Judul')
                    ->maxLength(100),
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->placeholder('Masukkan Deskripsi')
                    ->maxLength(65535),
                Forms\Components\Select::make('tipe')
                    ->label('Tipe')
                    ->required()
                    ->options([
                        'banner' => 'Banner',
                        'list' => 'List',
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('tipe')
                    ->label('Tipe')
                    ->searchable(),
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
                    ->label('Tambah Tips Kesehatan')
                    ->url(route('filament.admin.resources.kesehatan-tips.create'))
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
            'index' => Pages\ListKesehatanTips::route('/'),
            'create' => Pages\CreateKesehatanTips::route('/create'),
            'edit' => Pages\EditKesehatanTips::route('/{record}/edit'),
        ];
    }
}
