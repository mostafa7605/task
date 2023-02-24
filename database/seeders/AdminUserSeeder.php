<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Hardik',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
