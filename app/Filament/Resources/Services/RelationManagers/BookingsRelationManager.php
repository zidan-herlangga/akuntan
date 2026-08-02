<?php

declare(strict_types=1);

namespace App\Filament\Resources\Services\RelationManagers;

use App\Enums\BookingStatus;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BookingsRelationManager extends RelationManager
{
    protected static string $relationship = 'bookings';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('booking_number')
            ->columns([
                TextColumn::make('booking_number')
                    ->label('Nomor Booking')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client_name')
                    ->label('Nama Klien')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('starts_at')
                    ->label('Mulai')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (BookingStatus $state) => $state->label())
                    ->color(fn (BookingStatus $state) => $state->color())
                    ->sortable(),
            ])
            ->defaultSort('starts_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(BookingStatus::class),
            ])
            ->headerActions([
                AssociateAction::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                DissociateAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}