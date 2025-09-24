<?php

namespace App\Enum;

enum ItemStatus: string
{
    case PENDING = 'pending';
    case VALIDATED  = 'validated';
    case REJECTED = 'rejected';
    case ARCHIVED = 'archived';

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::VALIDATED => 'Validated',
            self::REJECTED => 'Rejected',
            self::ARCHIVED => 'Archived',
        };
    }
}
