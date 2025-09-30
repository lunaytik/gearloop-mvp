<?php

namespace App\Enum;

enum Season: string
{
    case WINTER = 'winter';
    case AUTUMN  = 'autumn';
    case SPRING = 'spring';
    case SUMMER = 'summer';
    case THREE_SEASONS = '3_seasons';
    case FOUR_SEASONS = '4_seasons';

    public function getLabel(): string
    {
        return match ($this) {
            self::WINTER => 'Winter',
            self::AUTUMN => 'Autumn',
            self::SPRING => 'Spring',
            self::SUMMER => 'Summer',
            self::THREE_SEASONS => '3 Seasons',
            self::FOUR_SEASONS => '4 Seasons',
        };
    }
}
