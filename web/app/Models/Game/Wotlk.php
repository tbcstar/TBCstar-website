<?php

namespace App\Models\Game;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wotlk extends Model
{
    use HasFactory;

    protected $connection = 'WotlkAuth';

    protected $table = 'account';

    protected $guarded = [];

    const CREATED_AT = 'joindate';
    const UPDATED_AT = 'last_login';

    protected $hidden = [
        'sha_pass_hash'
    ];

    public static function newPassword($user, $password) {
        return self::where('username', $user)->update([
            'sha_pass_hash' => strtoupper(sha1(strtoupper($user. ':' . $password)))
        ]);
    }

    public function donate(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AccountDonate::class, 'id', 'id');
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Banned::class, 'id', 'id');
    }
}
