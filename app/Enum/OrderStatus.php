<?php

namespace App\Enum;

class OrderStatus
{
    const NEW = ['name' => 'New', 'value' => 0];

    const IN_PROGRESS = ['name' => 'In Progress', 'value' => 1];

    const COMPLETED = ['name' => 'Completed', 'value' => 2];

    const ASSIGNED = ['name' => 'Assigned', 'value' => 3];

    const CANCELLED = ['name' => 'Cancelled', 'value' => 4];

    public static function allStatus()
    {
        $status = [
            self::NEW,
            // self::IN_PROGRESS,
            self::COMPLETED,
            self::CANCELLED,
        ];

        return $status;
    }
}
