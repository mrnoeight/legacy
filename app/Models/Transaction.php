<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'registration_id',
        'firstName',
        'lastName',
        'trxId',
        'merId',
        'merTrxId',
        'invoiceNo',
        'goodsNm',
        'payToken',
        'merchantToken',
        'timeStamp',
        'bankId',
        'bankName',
        'cardNo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
