<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@geni.asia',
            'password' => Hash::make('admin123')
        ]);

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@geni.asia',
            'password' => Hash::make('user123')
        ]);
        $user->assignRole('user');
        $admin->assignRole('admin');
    }
}
