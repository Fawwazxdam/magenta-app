<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryService();
    }

    public function index()
    {
        return view('category.index');
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->validate([
                    'name' => 'required|string|max:255',
                ]);
                $data = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'created_on' => now(),
                ];

                $category = $this->category->createCategory($data);
            });
            return redirect()->route('category')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function show(string $uuid)
    {
        $category = $this->category->getCategoryByUuid($uuid);
        return view('category.show', compact('category'));
    }

    public function edit(string $uuid)
    {
        $category = $this->category->getCategoryByUuid($uuid);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, string $uuid)
    {
        try {
            DB::transaction(function () use ($request, $uuid) {
                $category = $this->category->getCategoryByUuid($uuid);
            });
            return redirect()->route('category')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $err) {
            //throw $th;
        }
    }

    public function destroy(string $uuid)
    {
        $category = $this->category->getCategoryByUuid($uuid);
        return redirect()->route('category')->with('success', 'Data Berhasil Dihapus');
    }
}
