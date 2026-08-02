<?php

namespace App\Filament\Resources\ScheduleSlots\Pages;

use App\Filament\Resources\ScheduleSlots\ScheduleSlotResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditScheduleSlot extends EditRecord
{
    protected static string $resource = ScheduleSlotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
