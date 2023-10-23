<?php

namespace App\Traits;

use Spatie\QueryBuilder\QueryBuilder;


trait FilterSort
{
    abstract public static function filterColumns();

    abstract public static function sortColumns();

    public static function setFilters()
    {
        return QueryBuilder::for(static::class)
            ->allowedFilters(static::filterColumns())
            ->allowedSorts(static::sortColumns());
    }
}
