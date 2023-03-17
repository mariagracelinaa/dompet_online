<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;

    public function categories(){
        return $this->belongsTo('App\Category','categories_id');
    }

    public function users(){
        return $this->belongsTo('App\User','users_id');
    }
}
