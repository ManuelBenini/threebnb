<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user = new User();
        $new_user->name = 'Manuel';
        $new_user->surname = 'Benini';
        $new_user->date_of_birth = '2000/05/01';
        $new_user->email = 'manuelbenini@gmail.com';
        $new_user->password = Hash::make(12341234);
        $new_user->remember_token = true;
        $new_user->save();
    }
}
