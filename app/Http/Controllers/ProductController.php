<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $product;
    protected $category;

    public function __construct()
    {
        $this->product = new ProductService();
        $this->category = new CategoryService();
    }
    public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        try {
            $viewData = [
                'categories' => $this->category->getCategories(),
            ];
            return view('product.add', $viewData);
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->validate([
                    'name' => 'required|string',
                    'category_id' => 'required|integer',
                    'price' => 'required',
                ]);

                $data = [
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'created_on' => now(),
                ];

                $product = $this->product->createProduct($data);

                if (!empty($request->image)) {
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                    $path = 'storage/uploads/images/products/' . $imageName;
                    $request->image->storeAs('public/uploads/images/products/', $imageName);
                    $product->images()->create([
                        'url' => $path,
                        'title' => $request->name,
                        'description' => $request->description,
                        'created_on' => now(),
                    ]);
                }
            });
            return redirect()->route('product')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function show($uuid)
    {
        $product = $this->product->getProductByUuid($uuid);
        return view('product.show', compact('product'));
    }

    public function edit($uuid)
    {
        $viewData = [
            'categories' => $this->category->getCategories(),
            'product' => $this->product->getProductByUuid($uuid),
        ];
        return view('product.edit', $viewData);
    }

    public function update(Request $request, string $uuid)
    {
        try {
            DB::transaction(function () use ($request, $uuid) {
                $request->validate([
                    'name' => 'required|string',
                    'category_id' => 'required|integer',
                    'price' => 'required',
                ]);

                $data = [
                    'category_id' => $request->category_id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                ];

                $product = $this->product->getProductByUuid($uuid);
                $product->update($data);


                if (!empty($request->image)) {
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                    $path = 'storage/uploads/images/products/' . $imageName;
                    $request->image->storeAs('public/uploads/images/products/', $imageName);
                    $product->images()->create([
                        'url' => $path,
                        'title' => $request->name,
                        'description' => $request->description,
                        'created_on' => now(),
                    ]);
                }
            });
            return redirect()->route('product')->with('success', 'Data Berhasil Diubah');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function destroy(string $uuid)
    {
        try {
            DB::transaction(function () use ($uuid) {
                $product = $this->product->getProductByUuid($uuid);
                foreach ($product->images as $image) {
                    Storage::delete($image->url);
                    $image->delete();
                }
                $product->delete();
            });
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }
}
