<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function books(){
        //khoa ngoai va khoa chin cua 2 bang tuong ung
        return $this->hasMany("App\Book",'id_category',"id");
    }
}
