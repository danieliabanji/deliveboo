<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Restaurant;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,

        ]);

        // $restaurant = Restaurant::create([
        //     'restaurant_name' => $request->restaurant_name,
        //     'p_iva' => $request->p_iva,
        //     'address' => $request->address,
        //     'contact_phone' => $request->contact_phone,
        //     'description' => $request->description,
        //     'delivery_price' => $request->delivery_price,
        //     'opening_time' => $request->opening_time,
        //     'closing_time' => $request->closing_time,
        //     'min_price_order' => $request->min_price_order,
        //     'image' => $request->image,
        //     'rating' => $request->rating,

        // ]);




        event(new Registered($user));
        // event(new Registered($restaurant));


        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
