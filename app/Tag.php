<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function chat()
   {
     return $this->belongsTo(Chat::class);
   }

   public function board()
   {
     return $this->belongsTo(Board::class);
   }
   public function links()
   {
     return $this->belongsToMany(Link::class);
   }
}
