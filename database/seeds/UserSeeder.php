<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
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
        DB::table('users')->truncate();

        // generate 3 users/author
       
        DB::table('users')->insert([
            [
                'name' => 'vandy ahmad',
                'email' => 'vandyahmad@gmail.com',
                'password' => bcrypt('123123'),
                'level' => 'admin',
                'created_at' => Carbon::now(),
                'profile_id' => '1'
            ],
            [
                'name' => 'santri',
                'email' => 'santri@gmail.com',
                'password' => bcrypt('123123'),
                'level' => 'santri',
                'created_at' => Carbon::now(),
                'profile_id' => '2'
            ],
            [
                'name' => 'pengurus',
                'email' => 'pengurus@gmail.com',
                'password' => bcrypt('123123'),
                'level' => 'pengurus',
                'created_at' => Carbon::now(),
                'profile_id' => '3'
            ],
          
        ]);
    }
}
