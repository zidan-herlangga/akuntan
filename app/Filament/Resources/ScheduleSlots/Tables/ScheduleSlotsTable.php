<?php

declare(strict_types=1);

namespace App\Filament\Resources\ScheduleSlots\Tables;

use App\Enums\SlotStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ScheduleSlotsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('consultant.name')
                    ->label('Konsultan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('starts_at')
                    ->label('Waktu Mulai')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                TextColumn::make('ends_at')
                    ->label('Waktu Selesai')
                    ->dateTime('d M Y, H:i'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (SlotStatus $state): string => match ($state) {
                        SlotStatus::Available => 'success',
                        SlotStatus::Booked => 'warning',
                        SlotStatus::Blocked => 'danger',
                    })
                    ->formatStateUsing(fn (SlotStatus $state): string => $state->label()),
                TextColumn::make('booking.booking_number')
                    ->label('Booking')
                    ->placeholder('-'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(SlotStatus::class),
                SelectFilter::make('consultant')
                    ->relationship('consultant', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('starts_at', 'desc')
            ->striped()
            ->deferLoading()
            ->defaultPaginationPageOption(25)
            ->paginated([25, 50, 100])
            ->emptyStateIcon('heroicon-o-inbox')
            ->emptyStateHeading('Belum ada slot jadwal')
            ->emptyStateDescription('Buat slot jadwal agar klien dapat memilih waktu konsultasi.');
    }
}
