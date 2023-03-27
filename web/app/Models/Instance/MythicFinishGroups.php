<?php

namespace App\Models\Instance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MythicFinishGroups extends Model
{
    use HasFactory;

    protected $connection = 'WotlkChar100';

    protected $table = 'mythic_finish_groups';
}
