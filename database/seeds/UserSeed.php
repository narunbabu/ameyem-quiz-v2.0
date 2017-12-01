<?php

use AmeyemQuiz\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    public function run()
    {
        DB::table((new User)->getTable())->truncate();

        User::insert([
            [
                'id'             => 1,
                'name'           => 'arun',
                'email'          => 'ab@ameyem.com',
                'password'       => '$2y$10$BBix28SYldcHKC/9dO1RsepuMoNk9m39.BjOEixE3hpeZmwgPLS.W',
                'role_id'        => 1,
                'remember_token' => '',
            ],
        ]);
    }
}
