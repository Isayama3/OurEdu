<?php
namespace App\Enums;

enum TransactionStatusEnum: string
{
    use EnumCustom;

    case AUTHORIZED = '1';
    case DECLINE = '2';
    case REFUNDED = '3';
}
