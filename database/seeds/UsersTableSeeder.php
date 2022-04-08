<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Hash ;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','smrr917@gmail.com')->first();//Eloquent ORM
        //or use Query builder
        //$user=DB::table('users')->where('email','smrr917@gmail.com')->first();
        if(!$user)
        {
            User::create([
                'name' => 'Sam',
                'email' => 'Sam@gamil.com',
                'password' => Hash::make('12345678'),
                'role'  => 'admin'
            ]);
        }
       
    }
}
