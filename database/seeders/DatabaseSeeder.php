<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $admin = new User;
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->no_unik = '12345678';
        $admin->gender = 'Laki-laki';
        $admin->password = \Hash::make('qwertyuiop');
        $admin->role = 'Admin';
        $admin->status = 'Active';
        $admin->save();
        $this->command->info("Admin berhasil ditambahkan");
    }
}
