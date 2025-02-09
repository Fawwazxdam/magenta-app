<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductService
{
    public function getProducts(array $params = [])
    {
        return Product::with('images', 'category')->get();
    }

    public function getDatatable(array $params = [])
    {
        return DataTables::of($this->getProducts($params))->make(true);
    }

    public function getProduct(string $ID)
    {
        return Product::with('images', 'category')->find($ID);
    }

    public function getProductByUuid(string $uuid)
    {
        return Product::with('images', 'category')->where('uuid', $uuid)->first();
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
