<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Asian Food Sticker',
                'description' => 'Sticker Bontax Asian Food',
                'created_on' => now(),
            ],
            [
                'name' => 'Asian Food Label',
                'description' => 'Art Paper 120 GSM Asian Food',
                'created_on' => now(),
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
