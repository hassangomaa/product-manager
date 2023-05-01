<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Validator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@abc.com',
                'password' => bcrypt('Password1@'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('Password1@'),
            ],
            [
                'name' => 'Bob Johnson',
                'email' => 'bob.johnson@xyz.com',
                'password' => bcrypt('Password1@'),
            ],
        ];

//        foreach ($users as $user) {
//            $validator = \Illuminate\Contracts\Validation\Validator::make($user, $this->validator($user)->getRules());
//
//            if ($validator->fails()) {
//                continue;
//            }
//
//        }
        User::create($users[0]);
        User::create($users[1]);
        User::create($users[2]);

    }

}
