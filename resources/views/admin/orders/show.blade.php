@extends('layouts.app')


@section('content')
    <div id="order-show">
        <h1 class="text-center mb-4">Riepilogo ordine numero {{$order->id}}</h1>
        <div class="container">
            <div class="d-flex flex-wrap justify-content-around">
                <div class="col-12 col-md-6">
                    <h3 class="p-1">Dati Cliente</h3>
                    <div class="d-flex flex-wrap">
                        <div class="me-5 p-1 col-12 col-xxl-5"><span class="fw-bold">Nome:</span> {{ $order->customer_name }}
                        </div>
                        <div class="me-5 p-1 col-12 col-xxl-5"><span class="fw-bold">Cognome:</span>
                            {{ $order->customer_lastname }}</div>
                        <div class="p-1 col-12 col-xxl-5"><span class="fw-bold">Telefono:</span> {{ $order->contact_phone }}
                        </div>
                    </div>
                    <div class="p-1"><span class="fw-bold">Indirizzo</span>: {{ $order->address }}</div>
                    <div class="p-1"><span class="fw-bold">Email:</span> {{ $order->email }}</div>
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="p-1">Dati Ordine</h3>
                    <div class="p-1"><span class="fw-bold">Codice:</span> {{ $order->order_code }}</div>
                    <div class="p-1"><span class="fw-bold">Data:</span> {{ $order->order_time }}</div>
                    <div class="p-1 price"><span class="fw-bold">Prezzo Totale:</span> {{ $order->final_price }}&nbsp;&euro;
                    </div>
                </div>
            </div>
            <table class="my-5">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Quantità</th>
                        <th scope="col">Prezzo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ $product->pivot->current_price }}&nbsp;&euro;</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
