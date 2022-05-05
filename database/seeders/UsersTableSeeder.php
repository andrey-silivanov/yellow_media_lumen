<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        User::factory()
            ->count(1)
            ->create([
                'email'    => 'test@mail.com',
                'password' => Hash::make('123456'),
            ]);
    }
}
