<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //
    public function tags()
   {
     return $this->hasMany(Tag::class);
   }
}
