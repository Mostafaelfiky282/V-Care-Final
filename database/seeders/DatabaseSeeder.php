<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\major;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {    
        Major::factory(100)->create();
        User::factory(150)->create();
    }
}
