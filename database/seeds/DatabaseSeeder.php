<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	$user = new User;
    	$user->username = 'justin';
    	$user->password = bcrypt('justin');
    	$user->role = 1;
    	$user->save();
    }
}
