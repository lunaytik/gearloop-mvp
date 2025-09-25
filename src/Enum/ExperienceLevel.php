<?php

namespace App\Enum;

enum ExperienceLevel: string
{
    case BEGINNER = 'beginner';
    case INTERMEDIATE  = 'intermediate';
    case EXPERT = 'expert';

    public function getLabel(): string
    {
        return match ($this) {
            self::BEGINNER => 'Beginner',
            self::INTERMEDIATE => 'Intermediate',
            self::EXPERT => 'Expert',
        };
    }
}
