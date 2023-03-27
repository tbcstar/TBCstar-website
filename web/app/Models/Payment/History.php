<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service',
        'services',
        'title',
        'price',
        'status',
        'order_id',
        'servicesKey',
        'wallet',
    ];
    protected $primaryKey = 'order_id';
}
