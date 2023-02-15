<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (!Auth::user()->restaurant) {
            abort('404');
        }
        $restaurant_id = Auth::user()->restaurant->id;
        $orders = Order::whereHas(
            'products',
            function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            }
        )->orderBy('order_time', 'DESC')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     *
     */
    public function store(StoreOrderRequest $request)
    {
        // Validazione dei dati inviati dal form Vue.js
        $data = $request->validate([
            'customer_name' => 'required|min:3|max:100',
            'customer_lastname' => 'required|min:3|max:100',
            'email' => 'required|email|max:70',
            'address' => 'required|max:70',
            'final_price' => 'required|numeric',
            'order_time' => 'required|date_format:Y-m-d H:i:s',
            'paid_status' => 'required|boolean',
        ]);

        // Salva l'ordine nel database
        $order = new Order();
        $order->customer_name = $data['customer_name'];
        $order->customer_lastname = $data['customer_lastname'];
        $order->email = $data['email'];
        $order->address = $data['address'];
        $order->final_price = $data['final_price'];
        $order->order_time = $data['order_time'];
        $order->paid_status = $data['paid_status'];
        $order->save();

        // Restituisci una risposta JSON con l'ordine appena salvato
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     */
    public function show(Order $order)
    {
        if (!Auth::user()->restaurant) {
            abort(404);
        }
        //controllo che il ristoratore stia accedendo solo ai suoi piatti tramite l'id utente
        $restaurant_id = Auth::user()->restaurant->id;
        $product = $order->products()->first();
        if ($restaurant_id !== $product->restaurant_id) {
            abort(403);
        }
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     *
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     *
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     *
     */
    public function destroy(Order $order)
    {
        //
    }
}