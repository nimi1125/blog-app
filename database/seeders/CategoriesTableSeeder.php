<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'ビーチリゾート',
        ]);

        Category::create([
            'name' => '歴史・文化',
        ]);

        Category::create([
            'name' => '自然・アウトドア',
        ]);
    }
}
