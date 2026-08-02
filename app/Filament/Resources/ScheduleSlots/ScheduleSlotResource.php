<?php

declare(strict_types=1);

namespace App\Filament\Resources\ScheduleSlots;

use App\Filament\Resources\ScheduleSlots\Pages\CreateScheduleSlot;
use App\Filament\Resources\ScheduleSlots\Pages\EditScheduleSlot;
use App\Filament\Resources\ScheduleSlots\Pages\ListScheduleSlots;
use App\Filament\Resources\ScheduleSlots\Schemas\ScheduleSlotForm;
use App\Filament\Resources\ScheduleSlots\Tables\ScheduleSlotsTable;
use App\Models\ScheduleSlot;
use BackedEnum;
use Filament\Resources\Resource;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ScheduleSlotResource extends Resource
{
    protected static ?string $model = ScheduleSlot::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static UnitEnum|string|null $navigationGroup = 'Reservasi';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'Slot Jadwal';

    protected static ?string $pluralModelLabel = 'Jadwal';

    public static function form(Schema $schema): Schema
    {
        return ScheduleSlotForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ScheduleSlotsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListScheduleSlots::route('/'),
            'create' => CreateScheduleSlot::route('/create'),
            'edit' => EditScheduleSlot::route('/{record}/edit'),
        ];
    }
}
