<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new ProductService();
    }

    public function getDatatable(Request $request)
    {
        return $this->product->getDatatable($request->all());
    }
}
