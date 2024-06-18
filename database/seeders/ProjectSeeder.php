<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'title' => 'Primo Progetto',
            'description' => 'Descrizione del primo progetto.',
            'image' => 'path/to/image1.jpg'
        ]);

        Project::create([
            'title' => 'Secondo Progetto',
            'description' => 'Descrizione del secondo progetto.',
            'image' => 'path/to/image2.jpg'
        ]);
    }
}

