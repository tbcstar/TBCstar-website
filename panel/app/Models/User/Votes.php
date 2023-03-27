<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;

    protected $fillable = [
        'votes_id',
        'voted_at',
        'name',
        'balance',
        'vote',
        'ip',
        'complete'
    ];
}
