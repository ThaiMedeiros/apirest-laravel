<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create users using factory
        factory(User::class, 10)->create();

        //create new user
        /*User::create([
            'name' => 'User default system',
            'email' => 'user@gmail.com',
            'password' => bcrypt('teste123'),
        ]);*/
    }
}
