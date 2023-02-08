<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $products = Restaurant::all();
            return view('admin.dashboard', compact('products'));
        } else {
            $restaurants = Restaurant::where('user_id', Auth::user()->id)->first();
            if ($restaurants) {
                return view('admin.dashboard', compact('restaurants'));
            } else {
                $categories = Category::all();
                return view('admin.single_restaurant.create', compact('categories'));

            }
        }
    }
}
