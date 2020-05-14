<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = "profiles";
	 protected $fillable = [
        'nis', 'fullname', 'foto','jenis_kelamin','alamat','provinsi','kabupaten'
    ];

    public function user()
    {
    	return $this->hasOne('App\User');
    }
}
