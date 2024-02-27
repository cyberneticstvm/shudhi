<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('status', 1)->latest()->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'category_id' => 'required',
            'status' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        $url = uploadFile($request->file('image'), $path = 'products');
        $input['image'] = $url;
        Product::create($input);
        return redirect()->route('products')->with("success", "Product created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cats = Category::all();
        $product = Product::findOrFail(decrypt($id));
        return view('admin.product.edit', compact('cats', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name,' . $id,
            'category_id' => 'required',
            'status' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $input = $request->all();
        if ($request->file('image')) :
            $url = uploadFile($request->file('image'), $path = 'products');
            $input['image'] = $url;
        endif;
        Product::findOrFail($id)->update($input);
        return redirect()->route('products')->with("success", "Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail(decrypt($id))->delete();
        return redirect()->route('products')->with("success", "Product deleted successfully");
    }
}
