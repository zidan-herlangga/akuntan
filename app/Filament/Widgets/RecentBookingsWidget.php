<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Enums\BookingStatus;
use App\Filament\Resources\Bookings\BookingResource;
use App\Models\Booking;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentBookingsWidget extends TableWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Booking::query()
                    ->with(['consultant', 'service'])
                    ->where('starts_at', '>=', now()->subDays(30)),
            )
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
                    ->searchable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('client_phone')
                    ->label('Telepon')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                TextColumn::make('consultant.name')
                    ->label('Konsultan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service.title')
                    ->label('Layanan')
                    ->placeholder('-'),
                TextColumn::make('starts_at')
                    ->label('Jadwal')
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
                EditAction::make()
                    ->label('Kelola')
                    ->icon('heroicon-m-pencil-square')
                    ->url(fn (Booking $record): string => BookingResource::getUrl('edit', ['record' => $record])),
            ])
            ->headerActions([
                Action::make('view_all')
                    ->label('Lihat Semua Reservasi')
                    ->icon('heroicon-m-arrow-right-circle')
                    ->url(BookingResource::getUrl('index')),
            ])
            ->defaultSort('starts_at', 'desc')
            ->defaultPaginationPageOption(10)
            ->paginated([10, 25, 50])
            ->striped()
            ->poll('30s');
    }
}
