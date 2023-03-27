<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatchList extends Model
{
    use HasFactory;

    protected $table = 'patch_list';

    protected $fillable = [
        "title",
        "slug"
    ];
}
