<?php

namespace App\Enum;

class PropertyImageType
{
    const FRONT_OF_THE_HOUSE = 1;

    const SIDE_OF_THE_HOUSE = 2;

    const BACK_OF_THE_HOUSE = 3;

    const FUSE_BOARD = 4;

    const BATTERY_AND_INVERTER_POSITION = 5;

    const ELECTRIC_METER = 6;

    const INSIDE_OF_ATTIC = 7;

    const ELECTRICITY_BILLS = 8;

    const ADDITIONAL_IMAGES = 9;

    public function getImageType(string $key): ?int
    {
        return constant("self::$key") ?? null;
    }
}
