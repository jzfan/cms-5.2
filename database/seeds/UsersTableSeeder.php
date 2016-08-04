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
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('123')
        	]);
        User::create([
        	'name' => 'demo',
        	'email' => 'demo@demo.com',
        	'password' => bcrypt('123')
        	]);
        factory(App\User::class, 15)->create();
    }
}
