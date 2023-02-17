<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPaymentRequest;
use Illuminate\Http\Request;
use App\Mail\NewOrder;
use App\Models\Order;
use App\Models\Lead;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Product;
use Braintree\Gateway;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class CartController extends Controller
{


    public function purchase(Request $request)
    {
        try {
            // Validazione dei dati inviati dal form Vue.js
            $data = $request->validate([
                'customer_name' => 'required|min:3|max:100',
                'customer_lastname' => 'required|min:3|max:100',
                'contact_phone' => 'required|min:7|max:15',
                'email' => 'required|email|max:70',
                'address' => 'required|max:70',
                'order_time' => 'required|date_format:Y-m-d H:i:s',
                'final_price' => 'required',
                'order_code' => 'required',
                'paid_status' => 'required',
            ]);

            // $mail_data = $request->all();

            // $validator = Validator::make($mail_data, [
            //     'name' => 'required|max:100',
            //     'email' => 'required|email|max:100',
            //     'address' => 'required|max:150',
            //     'contact_phone' => 'required|min:7|max:15',
            // ], );

            // if ($validator->fails()) {
            //     return response()->json([
            //         'success' => false,
            //         'errors' => $validator->errors()
            //     ]);
            // }



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

            $list_item = [];
            foreach ($request->cart as $item) {
                $key = $item['id'];
                $quantity = $item['quantity'];
                $price = $item['price'];
                $list_item[$key] = ['quantity' => $quantity, 'current_price' => $price];
            }
            $order->products()->attach($list_item);

            $new_lead = new Lead();
            $new_lead->name = $data['customer_name'];
            $new_lead->email = $data['email'];
            $new_lead->message = $order->order_code;

            $new_lead->save();

            Mail::to($new_lead->email)->send(new NewOrder($new_lead));

            $user_email = User::where('id', $request->cart[0]['restaurant_id'])->pluck('email')->first();

            Mail::to($user_email)->send(new NewOrder($new_lead));


            return response()->json([
                'results' => $request->all(),
                'order' => $order
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'errors' => $e->errors(),
            ], 422);
        }
    }
    public function makePayment(Request $request, Gateway $gateway)
    {

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'transazione eseguita'
            ];
            return response()->json($data);
        } else {
            $data = [
                'success' => false,
                'message' => 'transazione fallita'
            ];
            return response()->json($data);
        }

    }

    public function generate(Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        return response()->json($data);

    }
}