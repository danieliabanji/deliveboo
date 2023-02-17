<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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
        //
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

    public function getOrderStats()
    {
        $restaurant_id = Auth::user()->restaurant->id;

        // Retrieve total sales data by day
        $totalSalesByDay = Order::whereHas(
            'products',
            function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            }
        )
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->selectRaw('DATE(orders.order_time) as date, sum(order_product.quantity * order_product.current_price) as total_sales, sum(order_product.quantity) as total_quantity')
            ->groupBy('date')
            ->get();

        // Retrieve total sales data by day and week
        $totalSalesByWeek = Order::whereHas(
            'products',
            function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            }
        )
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->selectRaw('YEARWEEK(orders.order_time) as week, DATE_SUB(orders.order_time, INTERVAL WEEKDAY(orders.order_time) DAY) as start_date, sum(order_product.quantity * order_product.current_price) as total_sales, sum(order_product.quantity) as total_quantity')
            ->groupBy('week', 'start_date')
            ->get()
            ->map(function ($item) {
                return [
                    'week' => date('W', strtotime($item->start_date)),
                    'year' => date('Y', strtotime($item->start_date)),
                    'total_sales' => $item->total_sales,
                    'total_quantity' => $item->total_quantity
                ];
            });
        // Retrieve total sales data by day, week, and month
        $totalSalesByMonth = Order::whereHas(
            'products',
            function ($query) use ($restaurant_id) {
                $query->where('restaurant_id', $restaurant_id);
            }
        )
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->selectRaw('YEAR(orders.order_time) as year, MONTH(orders.order_time) as month, sum(order_product.quantity * order_product.current_price) as total_sales, sum(order_product.quantity) as total_quantity')
            ->groupBy('year', 'month')
            ->get();

        // Retrieve product sales data
        $productSales = DB::table('order_product')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('sum(order_product.quantity) as total_quantity'))
            ->where('products.restaurant_id', $restaurant_id)
            ->groupBy('products.name')
            ->get();

        $productLabels = $productSales->pluck('name')->toArray();
        $productQuantities = $productSales->pluck('total_quantity')->toArray();

        return view('admin.stats.index', compact('totalSalesByDay', 'productLabels', 'productQuantities', 'totalSalesByWeek', 'totalSalesByMonth'));
    }



}