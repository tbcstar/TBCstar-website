<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserData extends Model
{
    use HasFactory;

    protected $connection = "mysql";

    protected $table = "users";

    protected $fillable = [
        'user_id', 'free_name', 'first_name', 'last_name', 'email',
        'country', 'day', 'month', 'year',
        'phone_number', 'current_team_id', 'referred_by'
    ];

    protected $with = ['referrer'];

    public function getFullNameAttribute(): string
    {
        if ($this->first_name && $this->last_name) {
            return Str::ucfirst($this->first_name).' '.Str::ucfirst($this->last_name);
        }
        return 'Не указано';
    }

    public function getFullDateAttribute(): string
    {
        if ($this->day && $this->month && $this->year) {
            return Str::ucfirst($this->day).'.'.Str::ucfirst($this->month).'.'.Str::ucfirst($this->year);
        }
        return 'Не указано';
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

    public function referrer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
