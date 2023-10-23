<?php

namespace App\Models;

use App\Traits\FilterSort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Transaction extends Model
{
    use FilterSort;

    protected $fillable = [
        'id',
        'paid_amount',
        'currency',
        'status_code',
        'payment_date',
        'parent_identification',
        'parent_email',
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

    public function status()
    {
        return $this->belongsTo(TransactionStatus::class, 'status_code', 'code');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'parent_email', 'email');
    }
}
