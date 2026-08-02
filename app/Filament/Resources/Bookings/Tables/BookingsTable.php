<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bookings\Tables;

use App\Enums\BookingStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('booking_number')
                    ->label('Nomor Booking')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client_name')
                    ->label('Nama Klien')
                    ->searchable(),
                TextColumn::make('client_email')
                    ->label('Email Klien')
                    ->searchable(),
                TextColumn::make('consultant.name')
                    ->label('Konsultan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service.title')
                    ->label('Layanan')
                    ->placeholder('-'),
                TextColumn::make('starts_at')
                    ->label('Tanggal Mulai')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (BookingStatus $state): string => $state->color())
                    ->formatStateUsing(fn (BookingStatus $state): string => $state->label()),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(BookingStatus::class),
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
            ->emptyStateHeading('Belum ada reservasi')
            ->emptyStateDescription('Reservasi baru akan muncul di sini.');
    }
}
