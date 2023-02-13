<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Type;


class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $category_filter = $request->query('categoryFilter');
        $restaurants = Restaurant::when(!empty($category_filter), function ($q) use ($category_filter) {
            $q->whereHas(
                'categories',
                function ($q) use ($category_filter) {
                    $q->where('category_id', $category_filter);
                }
            );
        })->with('categories')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants,
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with('products')->with('categories')->first();
        if ($restaurant) {
            return response()->json([
                'success' => true,
                'results' => $restaurant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Non hai trovato nessun prodotto'
            ]);
        }

    }

    public function types()
    {
        $types = Type::all();
        return response()->json([
            'success' => true,
            'types' => $types,
        ]);
    }
    public function categories()
    {
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'categories' => $categories,
        ]);
    }
}