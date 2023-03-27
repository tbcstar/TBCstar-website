<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banned extends Model
{
    use HasFactory;

    protected $connection = 'WotlkAuth';

    protected $table = 'account_banned';

    public $timestamps = false;

    protected $casts = [
        'bandate' => 'datetime:d.m.y h:m',
        'unbandate' => 'datetime:d.m.y h:m',
    ];
}
