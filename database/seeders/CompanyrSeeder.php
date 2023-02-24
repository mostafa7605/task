<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'Hardik',
            'email' => 'admin@gmail.com',
            'phone' => '01123665478',
            'logo' => '',
            'address_name' => 'Egypt',
            'country' => 'Cairo',
            'city' => 'Hardik',
            'region' => '1',
        ]);
    }
}
