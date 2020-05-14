<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset table user
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
         DB::table('profiles')->truncate();
 
         DB::table('profiles')->insert([
             [
                 'nis' => '0001',
                 'fullname' => 'vandy ahmad misry ar razy',
                 'jenis_kelamin' => 'laki-laki',
                 'alamat' => 'jl akasia 8 no 3 kalisalak batang',
                 'provinsi' => 'jawa tengah',
                 'kabupaten' => 'batang',
                 'status' => 'pondok',
                 'foto' => 'profil.jpg'
             ],
             [
                 'nis' => '0002',
                 'fullname' => 'santri putri',
                 'jenis_kelamin' => 'perempuan',
                 'alamat' => 'jl cilacap',
                 'provinsi' => 'jawa tengah',
                 'kabupaten' => 'cilacap',
                 'status' => 'pondok',
                 'foto' => 'profil.jpg'
             ],
             [
                 'nis' => '0003',
                 'fullname' => 'pengurus',
                 'jenis_kelamin' => 'perempuan',
                 'alamat' => 'jl banjarnegara',
                 'provinsi' => 'jawa tengah',
                 'kabupaten' => 'banjarnegara',
                 'status' => 'pondok',
                 'foto' => 'profil.jpg'
             ],
         ]);
    }
}
