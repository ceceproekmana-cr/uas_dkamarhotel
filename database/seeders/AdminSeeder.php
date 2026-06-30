<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $admin = User::where('username', 'admin')->first();
        
        if (!$admin) {
            // Jika belum ada, buat baru
            User::create([
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
            ]);
            
            $this->command->info('Admin user created successfully!');
        } else {
            // Jika sudah ada, update password (opsional)
            $admin->update([
                'password' => Hash::make('admin123'),
                'name' => 'Administrator',
            ]);
            
            $this->command->info('Admin user updated successfully!');
        }
    }
}