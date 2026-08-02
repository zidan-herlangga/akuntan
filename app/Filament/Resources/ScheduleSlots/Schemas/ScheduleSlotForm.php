<?php

declare(strict_types=1);

namespace App\Filament\Resources\ScheduleSlots\Schemas;

use App\Enums\SlotStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ScheduleSlotForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Slot Jadwal')
                    ->description('Konsultan dan rentang waktu slot')
                    ->icon('heroicon-o-calendar-days')
                    ->schema([
                        Select::make('consultant_id')
                            ->label('Konsultan')
                            ->relationship('consultant', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                        Grid::make(2)
                            ->schema([
                                DateTimePicker::make('starts_at')
                                    ->label('Waktu Mulai')
                                    ->required()
                                    ->native(false),
                                DateTimePicker::make('ends_at')
                                    ->label('Waktu Selesai')
                                    ->required()
                                    ->native(false)
                                    ->after('starts_at'),
                            ]),
                    ]),

                Section::make('Status')
                    ->description('Status slot dan keterkaitan booking')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->collapsible()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('status')
                                    ->label('Status')
                                    ->options(SlotStatus::class)
                                    ->default(SlotStatus::Available)
                                    ->live()
                                    ->required(),
                                Select::make('booking_id')
                                    ->label('Nomor Booking')
                                    ->relationship('booking', 'booking_number')
                                    ->searchable()
                                    ->preload()
                                    ->visible(fn (callable $get) => $get('status') !== SlotStatus::Available->value),
                            ]),
                    ]),
            ]);
    }
}