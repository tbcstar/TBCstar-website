<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class ForumsXF extends Model
{
    protected $connection = 'forums';

    protected $table = 'xf_user';

    protected $primaryKey = 'user_id';

    protected $guarded = [];

    public $timestamps = false;
}
