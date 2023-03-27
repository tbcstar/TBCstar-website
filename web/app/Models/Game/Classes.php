<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Classes extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['name', 'description', 'talent_descr', 'card_subtitle', 'card_description'];

    public $timestamps = false;
}
