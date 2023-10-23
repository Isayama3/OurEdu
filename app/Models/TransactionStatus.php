<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{
    protected $fillable = [
        'id',
        'code',
        'value',
    ];

    public static function getTableName()
    {
        return with(new static())->getTable();
    }

}
