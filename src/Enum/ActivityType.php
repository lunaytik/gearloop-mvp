<?php

namespace App\Enum;

enum ActivityType: string
{
    case DAY_HIKE = 'day_hike';
    case BIVOUAC  = 'bivouac';
    case TREK = 'trek';

    public function getLabel(): string
    {
        return match ($this) {
            self::DAY_HIKE => 'Day Hike',
            self::BIVOUAC => 'Bivouac',
            self::TREK => 'Trek',
        };
    }
}
