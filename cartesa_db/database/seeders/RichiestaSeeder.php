<?php

namespace Database\Seeders;


use Database\Factories\RichiestaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RichiestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for( $i = 0; $i < 10; $i++ ) {
            RichiestaFactory::new()->create();
            }
    }
}
