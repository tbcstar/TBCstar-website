<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDonate extends Model
{
    use HasFactory;

    protected $connection = 'WotlkAuth';

    protected $table = 'account_donate';

    protected $guarded = [];

    public $timestamps = false;
}
