<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryService();
    }

    public function getDatatable(Request $request)
    {
        return $this->category->getDatatable($request->all());
    }
}
