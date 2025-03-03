<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryService
{
    public function getCategories(array $params = [])
    {
        $query = Category::all();

        return $query;
    }

    public function getDatatable(array $params = [])
    {
        return DataTables::of($this->getCategories($params))->make(true);
    }

    public function getCategory(string $ID)
    {
        return Category::find($ID);
    }

    public function getCategoryByUuid(string $uuid)
    {
        return Category::where('uuid', $uuid)->first();
    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function updateCategory(array $data, string $ID)
    {
        return Category::find($ID)->update($data);
    }

    public function deleteCategory(string $ID)
    {
        return Category::find($ID)->delete();
    }
}
