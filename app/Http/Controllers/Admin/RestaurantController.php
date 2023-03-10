<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Models\Category;
use App\Functions\Helpers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        // $restaurants = Restaurant::all();

        if (Auth::user()->isAdmin()) {
            $restaurants = Restaurant::all();

            return view('admin.single_restaurant.index', compact('restaurants'));

        } else {
            $restaurants = Restaurant::where('user_id', Auth::user()->id)->first();

            if ($restaurants) {
                $restaurant_id = $restaurants->id;
                $categories = Category::whereHas('restaurants', function ($query) use ($restaurant_id) {
                    $query->where('restaurant_id', $restaurant_id);
                })->get();

                return view('admin.single_restaurant.index', compact('restaurants', 'categories'));

            } else {

                $categories = Category::all();

                return view('admin.single_restaurant.create', compact('categories'));

            }

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.single_restaurant.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     *
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        $slug = Helpers::generateSlug($data['restaurant_name']);
        $data['slug'] = $slug;
        $data['user_id'] = Auth::user()->id;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('image', $request->image);
            $data['image'] = $path;
        }

        $new_restaurant = Restaurant::create($data);

        if ($request->has('categories')) {
            $new_restaurant->categories()->attach($request->categories);
        }

        return redirect()->route('admin.dashboard', $new_restaurant->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     *
     */
    public function show(Restaurant $restaurant)
    {
        // if (!Auth::user()->isAdmin() && $restaurant->user_id !== Auth::id()) {
        //     abort(403);
        // }

        // if (Auth::user()->isAdmin()) {

        //     $restaurants = Restaurant::all();

        // }elseif (!Auth::user()->restaurant()){

        //     abort(403);

        //  }

        return view('admin.single_restaurant.index', compact('restaurant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     *
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     *
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     *
     */
    public function destroy(Restaurant $restaurant)
    {
        if (!Auth::user()->isAdmin() && $restaurant->user_id !== Auth::id()) {
            abort(403);
        }
        if ($restaurant->image) {
            Storage::delete($restaurant->image);
        }

        $restaurant->delete();
        return redirect()->route('admin.single_restaurant.index')->with('message', "$restaurant->restaurant_name ?? stato cancellato correttamente!");
    }
}
