<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $products = [
            [
                'category_id' => $categories[0]->id,
                'name' => 'Asian Food Barcode SCV 3x3',
                'description' => 'Bontax A3+',
                'price' => 100,
                'created_on' => now(),
            ],
            [
                'category_id' => $categories[0]->id,
                'name' => 'Asian Food SCV 3x3 nutfact',
                'description' => 'Bontax A3+',
                'price' => 500,
                'created_on' => now(),
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
