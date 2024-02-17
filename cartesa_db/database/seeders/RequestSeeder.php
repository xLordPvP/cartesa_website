<?php

namespace Database\Seeders;

use Database\Factories\RequestFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for( $i = 0; $i < 10; $i++ ) {
            RequestFactory::new()->create();
            }
    }
}
