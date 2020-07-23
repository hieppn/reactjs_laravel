<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function category(){
        return $this->belongsTo("App\Category","id_category","id");
      }
}
