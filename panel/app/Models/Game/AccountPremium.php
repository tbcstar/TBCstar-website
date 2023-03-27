<?php

namespace App\Models\Game;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPremium extends Model
{
    use HasFactory;

    protected $connection = 'WotlkAuth';

    protected $table = 'account_premium';

    protected $guarded = [];

    public $timestamps = false;
}
