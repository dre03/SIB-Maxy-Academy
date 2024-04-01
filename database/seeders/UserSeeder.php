<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $user = [
                    [
                      'name'=>'Agay Sar',
                      'username'=>'agay',
                      'email'=>'agaysar@gmail.com',
                      'level'=>'bloger',
                      'password'=>Hash::make('agay1234')
                    ],
                    [
                      'name'=>'Bobi Bar',
                      'username'=>'bobi',
                      'email'=>'bobi@gmail.com',
                      'level'=>'bloger',
                      'password'=>Hash::make('bobi1234')
                    ],
                    [
                      'name'=>'Carli',
                      'username'=>'carli',
                      'email'=>'carli@gmail.com',
                      'level'=>'bloger',
                      'password'=>Hash::make('carli1234')
                    ],
                    [
                      'name'=>'Andre Apriyana',
                      'username'=>'andre',
                      'email'=>'andre@gmail.com',
                      'level'=>'user',
                      'password'=>Hash::make('andre1234')
                    ],

                    [
                      'name'=>'Budi',
                      'username'=>'budi',
                      'email'=>'budi@gmail.com',
                      'level'=>'user',
                      'password'=>Hash::make('budi1234')
                    ],
                    [
                      'name'=>'Caca',
                      'username'=>'caca',
                      'email'=>'caca@gmail.com',
                      'level'=>'user',
                      'password'=>Hash::make('caca1234')
                    ],
                ];

          foreach ($user as $key => $value) {
            User::create($value);
          }
    }
}
