<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'user',
            'fullname' => 'first',
            'email' => 'test@example.com',
            'password' => 'password',
            'nik' => '12345678',
            'no_hp' => '0834567899',
        ]);
        $this->call(RolePermissionSeeder::class);
    }
}
