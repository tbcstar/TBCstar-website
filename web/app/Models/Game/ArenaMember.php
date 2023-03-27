<?php

namespace App\Models\Game;

use App\Models\Characters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArenaMember extends Model
{
    use HasFactory;

    protected $connection = 'WotlkChar';

    protected $table = 'arena_team_member';

    protected $fillable = [
        "arenaTeamId",
        "guid",
        "weekGames",
        "weekWins",
        "seasonGames",
        "seasonWins",
        "personalRating"
    ];

    public function characters(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Characters::class, 'guid', 'guid');
    }

}
