<?php

declare(strict_types=1);

namespace App\Filament\Resources\Consultants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ConsultantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('specialization')
                    ->label('Spesialisasi')
                    ->placeholder('-'),
                ToggleColumn::make('is_active')
                    ->label('Aktif'),
                TextColumn::make('timezone')
                    ->label('Zona Waktu')
                    ->placeholder('-'),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->striped()
            ->deferLoading()
            ->defaultPaginationPageOption(25)
            ->paginated([25, 50, 100])
            ->emptyStateIcon('heroicon-o-inbox')
            ->emptyStateHeading('Belum ada konsultan')
            ->emptyStateDescription('Tambahkan konsultan untuk mulai menerima reservasi.');
    }
}
