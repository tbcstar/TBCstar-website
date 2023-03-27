<?php

namespace App\Models;

use App\Models\Forum\ForumsXF;
use App\Models\Game\AccountDonate;
use App\Models\Game\Banned;
use App\Models\Payment\History;
use App\Models\User\Gifts;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $connection = "auth";

    protected $table = 'account';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username', 'email', 'sha_pass_hash', 'reg_mail'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'sha_pass_hash',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'joindate' => 'datetime',
        'last_login' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    const CREATED_AT = 'joindate';
    const UPDATED_AT = 'last_login';

    public function getAuthPassword()
    {
        return $this->sha_pass_hash;
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Banned::class, 'id', 'id')->whereActive(1);
    }

    public function donate(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AccountDonate::class, 'id', 'id');
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(History::class, 'user_id', 'id');
    }

    public function gifts()
    {
        return $this->hasMany(Gifts::class, 'users_id', 'id');
    }

    public function forum(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ForumsXF::class, 'email', 'email');
    }

    public function active(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Characters::class, 'account')->where('isActive', 1);
    }

    public function info(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserData::class, 'user_id', 'id');
    }

    public function getEmailHiddenAttribute(): string
    {
        return self::hide_email($this->email);
    }

    function hide_email($email): string
    {
        $test = explode('@', $email);
        return str_pad(substr($test[0], 0, 3),strlen($test[0]),"*").'@'.$test[1];
    }

}
