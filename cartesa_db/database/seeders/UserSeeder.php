<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     for( $i = 0; $i < 10; $i++ ) {
    //     UserFactory::new()->create();
    //     }
    // }
    public function run(): void
    {
        # By default the next user will have password
        # that will be equal to "password" word
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            
        ]);
    }
}

