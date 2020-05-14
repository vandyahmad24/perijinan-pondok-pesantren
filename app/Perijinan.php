<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perijinan extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
