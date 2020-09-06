<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function bookso(){
        return $this->hasMany("App\Book",'id',"id_book");
    }   
}