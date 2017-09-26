<?php

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
        //factory(\App\User::class, 10)->create();
        factory(\App\User::class)->create([
            'name' => 'Common',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10)]);
        factory(\App\User::class)->create([
            'name' => 'Root',
            'email' => 'root@user.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10)]);
    }
}
