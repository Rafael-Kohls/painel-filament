<?php declare(strict_types=1);

namespace App;

enum GroupEnum: string
{
    case ADMIN = 'ADMIN';
    case GUEST = 'GUEST';
   

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => __('Admin'),
            self::GUEST => __('Guest'),
        };
    }
}
