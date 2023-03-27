<?php


namespace App\Models\Game;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArenaNew extends Model
{
    use HasFactory;

    protected $connection = 'WotlkChar100';

    protected $table = 'arena_team';

    protected $fillable = [
        "arenaTeamId",
        "name",
        "captainGuid",
        "type",
        "rating",
        "seasonGames",
        "seasonWins",
        "weekGames",
        "weekWins",
        "rank",
        "backgroundColor",
        "emblemStyle",
        "emblemColor",
        "borderStyle",
        "borderColor"
    ];

    public function team_member(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ArenaMemberNew::class, 'arenaTeamId', 'arenaTeamId');
    }

    public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ArenaMemberNew::class, 'arenaTeamId', 'arenaTeamId');
    }
}
