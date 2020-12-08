<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = "posts";

public function user(){
     return $this->belongsTo('App\user');
}

}
