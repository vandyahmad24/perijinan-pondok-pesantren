<?php

namespace App\Imports;

use App\User;
use App\Profile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;


class SantriImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
        	// dd($row);
        	$profil = Profile::create([
           		'nis' 			=> $row[1],
           		'fullname' 		=> $row[3],
           		'foto'			=> $row[8],
           		'jenis_kelamin' => $row[4],
           		'alamat'		=> $row[5],
           		'provinsi'		=> $row[6],
           		'kabupaten'		=> $row[7]
           ]);
           $user = User::create([
               'name'     => $row[2],
	           'email'    => $row[9],
	           'password' => Hash::make($row[10]),
	           'level'	  => $row[11],
	           'profile_id' => $profil->id
            ]);
           
        }
    }
}