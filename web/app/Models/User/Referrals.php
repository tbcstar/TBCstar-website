<?php

namespace App\Models\User;

use App\Models\Characters;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referrals extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ref_id',
        'bonus',
        'reward',
        'status'
    ];

    public function referrer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function characters(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Characters::class, 'user_id', 'id')->orderByDesc('totaltime');
    }

}
