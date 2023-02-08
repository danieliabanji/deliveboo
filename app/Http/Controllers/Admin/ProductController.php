<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {

        // $products = Product::all();

        if (Auth::user()->isAdmin()) {
            $products = Product::all();
            return view('admin.products.index', compact('products'));


        } else {

            // $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
            if (Auth::user()->restaurant) {

                $restaurant_id = Auth::user()->restaurant->id;
                $products = Product::where('restaurant_id', $restaurant_id)->get();

                return view('admin.products.index', compact('products'));
            }
            // if($products) {

            //      return view('admin.products.index', compact('products'));

            // } else {

            //      abort('404');

            // }
            abort('404');

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {

        // $products = Product::all();
        return view('admin.products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     *
     */
    public function store(StoreProductRequest $request)
    {
        // $userId = Auth::id();
        $data = $request->validated();
        // $restaurant = Restaurant::find(Auth::user()->id);
        // $restaurant_id = $restaurant->id;

        $restaurant_id = Auth::user()->restaurant->id;
        $data['restaurant_id'] = $restaurant_id ;

        $slug = Product::getSlug($request->name, $restaurant_id);

        $data['slug'] = $slug;
        $data['restaurant_id'] = $restaurant_id;

        // validazione per lo storage

        if ($request->hasFile('image')) {

            $image = Storage::disk('public')->put('image', $request->image);
            $data['image'] = $image;
        }
        $new_product = Product::create($data);

        return redirect()->route('admin.products.index', $new_product->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function show(Product $product)
    {

        if ($product->restaurant_id !== Auth::id()) {
            abort(403);
        }



        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function edit(Product $product)
    {

        return view('admin.products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     *
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $data = $request->validated();
        // $slug = Product::generateSlug($request->name);
        // $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $path = Storage::disk('public')->put('image', $request->image);
            $data['image'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('message', "$product->name aggiornato");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function destroy(Product $product)
    {
        // if (!Auth::user()->isAdmin() && $product->user_id !== Auth::id()) {
        //     abort(403);
        // }
        if ($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->name deleted successfully");

    }
}
