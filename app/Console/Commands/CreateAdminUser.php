<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Create admin user';

    public function handle()
    {
        $email = $this->ask('Enter admin email:');
        $password = $this->secret('Enter admin password:');

        // Hash the password
        $hashedPassword = Hash::make($password);

        // Create the admin user
        $admin = User::create([
            'nom_complet' => 'Admin',
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        $this->info('Admin user created successfully!');
    }
}
