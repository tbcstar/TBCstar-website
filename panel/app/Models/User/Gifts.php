<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    use HasFactory;

    protected $connection = "mysql";

    protected $table = 'users_gifts';

    protected $fillable = [
        'users_id', 'item', 'title', 'status', 'countItem'
    ];
}
