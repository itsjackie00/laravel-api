<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    public function run()
    {
        $technology = new Technology; // Create a new instance
        $technology->create(['name' => 'Laravel']);
        $technology->create(['name' => 'React']);
        // ... other technologies
    }
}

