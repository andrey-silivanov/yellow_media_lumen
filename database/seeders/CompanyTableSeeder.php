<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Company::factory()
            ->count(10)
            ->create();

        $user = User::find(1);
        $companies = Company::all()->pluck('id');
        $user->companies()->attach($companies);
    }
}
