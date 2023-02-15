<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validazione dei dati inviati dal form Vue.js
        $data = $request->validate([
            'customer_name' => 'required|min:3|max:100',
            'customer_lastname' => 'required|min:3|max:100',
            'contact_phone' => 'required|numeric|min:7|max:15',
            'email' => 'required|email|max:70',
            'address' => 'required|max:70',
            'order_time' => 'required|date_format:Y-m-d H:i:s',
            'final_price' => 'required|numeric',
            'order_code' => 'required|numeric',
            'paid_status' => 'required|boolean',
        ]);

        // Salva l'ordine nel database
        $order = new Order();
        $order->customer_name = $data['customer_name'];
        $order->customer_lastname = $data['customer_lastname'];
        $order->contact_phone = $data['contact_phone'];
        $order->email = $data['email'];
        $order->address = $data['address'];
        $order->order_time = $data['order_time'];
        $order->final_price = $data['final_price'];
        $order->order_code = $data['order_code'];
        $order->paid_status = $data['paid_status'];
        $order->save();

        // Restituisci una risposta JSON con l'ordine appena salvato
        return response()->json($order, 201);
    }
}