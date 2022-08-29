<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::where('email', 'admin@admin.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Civics";
            $user->email = "admin@admin.com";
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('admin');
        }

        $user = User::where('email', 'agent@agent.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Civics";
            $user->email = "agent@agent.com";
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('agent');
        }

        $user = User::where('email', 'user@user.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Civics";
            $user->email = "user@user.com";
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('user');
        }
    }
}
