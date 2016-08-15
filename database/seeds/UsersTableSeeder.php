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
    	User::truncate();
        User::create([
        	'name' => 'admin',
            'job' => 'Web Designer',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('123'),
            'avatar' => 'default.png',
            'phone' => '88888888'
        	]);
        User::create([
        	'name' => 'demo',
            'job' => 'Web Tester',
        	'email' => 'demo@demo.com',
        	'password' => bcrypt('123'),
            'avatar' => 'default.png',
            'phone' => '12312312311'
        	]);
        factory(App\User::class, 15)->create();
    }
}
