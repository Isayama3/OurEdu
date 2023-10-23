<?php

namespace App\Enums;

trait EnumCustom
{
    public static function casesValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function casesNames(): array
    {
        $caseNames = array_map(function ($item) {
            return strtolower($item->name);
        }, array_values(self::cases()));

        return $caseNames;
    }

    public static function __callStatic($method, $args)
    {
        $enumValue = (string) str($method)->snake();

        if (!in_array($enumValue, self::casesValues())) {
            throw new \Exception('Function Not Found In Enum Class', 422);
        }

        return $enumValue;
    }
}
