<?php

namespace App\Models;

use App\Models\Forum\Forums;
use App\Reactability;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Reactability;

    protected $table = 'topics';

    protected $fillable = ['title', 'body', 'user_id', 'forums_id'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $with = ['forums'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->comments()->forceDelete();
        });
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function forums(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Forums::class, 'forums_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function path(): string
    {
        return route('forums.topic', [$this->id]);
    }

    public function isHot() : bool
    {
        return $this->comments()->where('created_at', '>', now()->subDay())->count() > 10;
    }
}
