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
            $user->name = "Mohammad Shahin";
            $user->email = "admin@admin.com";
            $user->phone = "01707073407";
            $user->phone_verified_at = "2022-08-30 12:25:22";
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('admin');
        }

        $user = User::where('email', 'developer@developer.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Mehedi";
            $user->email = "developer@developer.com";
            $user->phone = "01768173259";
            $user->phone_verified_at = "2022-08-30 12:25:22";
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('admin');
        }

        $user = User::where('email', 'employer@employer.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Mehedi-employer";
            $user->email = "employer@employer.com";
            $user->phone = "01521410347";
            $user->phone_verified_at = "2022-08-30 12:25:22";
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('employer');
        }

        $user = User::where('email', 'employee@employee.com')->first();
        if(is_null($user)){
            $user = new User();
            $user->name = "Mehedi-employee";
            $user->email = "employee@employee.com";
            $user->phone = "01915951347";
            $user->phone_verified_at = "2022-08-30 12:25:22";
            $user->password = Hash::make('password');
            $user->save();
            $user->assignRole('employee');
        }
    }
}
