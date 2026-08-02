<?php

declare(strict_types=1);

namespace App\Enums;

enum SlotStatus: string
{
    case Available = 'available';
    case Booked = 'booked';
    case Blocked = 'blocked';

    public function label(): string
    {
        return match ($this) {
            self::Available => 'Available',
            self::Booked => 'Booked',
            self::Blocked => 'Blocked',
        };
    }
}
