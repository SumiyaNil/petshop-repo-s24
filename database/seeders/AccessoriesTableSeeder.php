<?php

namespace Database\Seeders;

use App\Models\Accessories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Accessories::factory()->count(100)->create();
    }
}
