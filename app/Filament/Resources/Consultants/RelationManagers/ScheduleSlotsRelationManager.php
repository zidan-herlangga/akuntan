<?php

declare(strict_types=1);

namespace App\Filament\Resources\Consultants\RelationManagers;

use App\Enums\SlotStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ScheduleSlotsRelationManager extends RelationManager
{
    protected static string $relationship = 'scheduleSlots';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('starts_at')
                    ->label('Mulai')
                    ->required(),
                DateTimePicker::make('ends_at')
                    ->label('Selesai')
                    ->required()
                    ->after('starts_at'),
                Select::make('status')
                    ->label('Status')
                    ->options(SlotStatus::class)
                    ->default(SlotStatus::Available)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('starts_at')
            ->columns([
                TextColumn::make('starts_at')
                    ->label('Mulai')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('ends_at')
                    ->label('Selesai')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (mixed $state): ?string => $state instanceof SlotStatus ? $state->label() : null),
                TextColumn::make('booking.booking_number')
                    ->label('Booking')
                    ->placeholder('-'),
            ])
            ->defaultSort('starts_at')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')   
                    ->options(SlotStatus::class),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Slot'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}