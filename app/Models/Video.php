<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['name','views'];
    protected $hidden = ['created_at','updated_at'];
    protected $timestampe = FALSE;
}
