<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function books(){
        return $this->hasMany("App\Book","id","id_book");
      }
      public function user(){
        return $this->hasOne("App\User","id","id_user");
      }
}
