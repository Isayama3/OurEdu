<?php

namespace App\Models;

use App\Traits\FilterSort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class User extends Model
{
    use FilterSort;

    protected $fillable = [
        'id',
        'email',
        'currency',
        'balance',
        'created_at',
    ];
    
    public static function getTableName()
    {
        return with(new static())->getTable();
    }

    public static function MyColumns()
    {
        return Schema::getColumnListing(self::getTableName());
    }

    public static function sortColumns(): array
    {
        return self::MyColumns();
    }

    public static function filterColumns(): array
    {
        return self::MyColumns();
    }

}
