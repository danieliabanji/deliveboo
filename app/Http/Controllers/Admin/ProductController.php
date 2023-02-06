<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {

        $products = Product::all();
        return redirect()->route('admin.product.create', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     *
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $slug = Product::generateSlug($request->name);

        $data['slug'] = $slug;

        $new_product = Product::create($data);


        // validazione per lo storage

        if ($request->hasFile('image')) {

            $image = Storage::disk('public')->put('image', $request->image);
            $data['thumb1'] = $image;
        }

        return redirect()->route('admin.product.show', $new_product->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function destroy(Product $product)
    {
        if($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.product.index')->with('message', "$product->name deleted successfully");

    }
}
