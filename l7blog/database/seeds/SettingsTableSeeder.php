<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Setting::create([
            'site_name'=> "Pasang's L7 Blog",
            'address'=>'Nepal, Kathmandu',
            'contact_number'=>'76786890890',
            'contact_email'=>'info@pasang.com',

        ]);
    }
}
