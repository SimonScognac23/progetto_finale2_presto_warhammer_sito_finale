<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'Space Marines',
        'Chaos Space Marines',
        'Imperial Guard',
        'Adeptus Mechanicus',
        'Sisters of Battle',
        'Custodes',
        'Grey Knights',
        'Tyranids',
        'Orks',
        'Eldar',
        'Dark Eldar',
        'Tau Empire',
        'Necrons',
        'Chaos Daemons',
        'Death Guard',
        'Thousand Sons',
        'World Eaters',
        "Emperor's Children"
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}