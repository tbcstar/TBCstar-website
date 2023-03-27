<?php

namespace App\Models\Payment;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $connection = "mysql";

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

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
