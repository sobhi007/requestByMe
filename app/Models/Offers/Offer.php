<?php

namespace App\Models\Offers;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
   public $table = 'offers';
   public $fillable = ['name_ar','name_en','description_ar','description_en'];
}
