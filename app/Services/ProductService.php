<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService
{
    public function getProducts(array $params = [])
    {
        return Product::with('images')->get();
    }

    public function getProduct(string $ID)
    {
        return Product::with('images')->find($ID);
    }

    public function getProductByUuid(string $uuid)
    {
        return Product::with('images')->where('uuid', $uuid)->first();
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct(array $data, string $ID)
    {
        return Product::where('id', $ID)->update($data);
    }

    public function deleteProduct(string $ID)
    {
        return Product::find($ID)->delete();
    }
}
