<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function transactions(){
        return $this->hasOne('App\transactions','categories_id','id');
    }
}
