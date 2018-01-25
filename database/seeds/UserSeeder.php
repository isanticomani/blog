<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('users')->insert([
    	// 	'name' => 'Pedrito Perez',
    	// 	'email' => 'pedrito@mail.com',
    	// 	'password' => bcrypt('pedrito'),
    	// 	'type' => 'admin'
    	// ]);
    	factory(App\User::class,100)->create();
    }
}
