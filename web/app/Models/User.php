<?php

namespace App\Models;

use App\Models\Game\Wotlk;
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

class User extends \TCG\Voyager\Models\User //implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $with = ['wotlk', 'referrer'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'username', 'country', 'plain',
        'day', 'month', 'year',
        'first_name', 'last_name', 'phone_number',
        'referrer_id', 'free_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function path()
    {
        return route('users.show', [$this->id]);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function reactions()
    {
        return $this->hasMany('App\Models\Reaction');
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(History::class, 'user_id', 'id');
    }

    public function gifts()
    {
        return $this->hasMany(Gifts::class, 'users_id', 'id');
    }

    public function reactables()
    {
        return collect([
            $this->comments()->withSum('reactions', 'value')->get(),
            $this->posts()->withSum('reactions', 'value')->get(),
        ])
            ->collapse()
            ->map(function ($reactable) {
                $display = $reactable instanceof Comment
                    ? $reactable->body
                    : $reactable->title;

                return $reactable->setAttribute('display', $display);
            });
    }

    // total score (combined score of all user's comments and posts)
    public function score()
    {
        return Reaction::whereHas('reactable', function($query) {
            $query->where('user_id', $this->id);
        })
            ->sum('value');
    }

    public function getFullNameAttribute(): string
    {
        return Str::ucfirst($this->first_name).' '.Str::ucfirst($this->last_name);
    }

    public function getFullNameHiddenAttribute(): string
    {
        if ($this->first_name && $this->last_name) {
            return self::star_replace(Str::ucfirst($this->first_name)).' '.self::star_replace(Str::ucfirst($this->last_name));
        }
        return 'Не указано';
    }

    public function getPhoneHiddenAttribute(): string
    {
        if($this->phone_number)  {
            return self::star_replace($this->phone_number);
        }
        return 'Не прикреплен';
    }


    public function getEmailHiddenAttribute(): string
    {
        return self::hide_email($this->email);
    }

    public function setFirstNameAttribute(string $value)
    {
        $this->attributes['first_name'] = Str::ucfirst($value);
    }

    public function setLastNameAttribute(string $value)
    {
        $this->attributes['last_name'] = Str::ucfirst($value);
    }

    public function getFullCountryAttribute(): string
    {
        if ($this->country) {
            return __('country.'.$this->country);
        }
        return 'Не указано';
    }

    function star_replace($string): string
    {
        if ($string) {
            return substr($string, 0, 2) . str_repeat("*", mb_strlen($string)-2) . substr($string, -2);
        }
        return 'Не указано';
    }

    function hide_email($email): string
    {
        $test = explode('@', $email);
        return str_pad(substr($test[0], 0, 3),strlen($test[0]),"*").'@'.$test[1];
    }

    public function referrer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class, 'referred_by');
    }

    public function wotlk(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Wotlk::class, 'email', 'email');
    }

    public function active(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Characters::class, 'id')->where('isActive', 1);
    }
}
