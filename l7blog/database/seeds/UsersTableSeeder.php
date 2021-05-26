<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=User::create([
            'name' => 'pasang sherpa',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'admin'=> 1,
        ]);

        App\Profile::create([
            'user_id'=>$user->id,
            "avatar"=>'uploads/avatars/1.JPG',
            'about'=>'lorem kdsflsjfl',
            'facebook'=>'facebook.com',
            'youtube' => 'youtube.com',
        ]);        
    }
}
