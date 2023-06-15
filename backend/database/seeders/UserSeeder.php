<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                User::NAME => 'javad mohammadian',
                User::EMAIL => 'javad@gmail.conm',
                User::MOBILE => '09120226510',
                User::PASSWORD => Hash::make('123456'),
                User::EMAIL_VERIFIED_AT => now(),
                User::DEPOSIT_NUMBER => '123456789'
            ]
        ];

        $banks = [1, 2, 3];

        foreach ($users as $user) {
            /** @var User $user */
            $user = User::create($user);
            $user->banks()->attach($banks);
        }
    }
}
