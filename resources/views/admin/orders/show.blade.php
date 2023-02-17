@extends('layouts.app')

@section('content')

<div class="container-wave-index-orders">

</div>
    <div id="order-show">
        <div class="details blocco-orders-show">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2 class="text-orange fw-bold">Dati cliente</h2>
                    <a href="{{route('admin.stats')}}" class="btn mybtn-orange">Vedi i grafici</a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Cognome</td>
                                <td>Telefono</td>
                                <td>Indirizzo</td>
                                <td class="text-start">Email</td>
    
                            </tr>
                        </thead>
    
                        <tbody>
                                <tr>
                                    <td class="text-start">{{ $order->customer_name }}</td>
                                    <td class="text-start">{{ $order->customer_lastname }}</td>
                                    <td>{{ $order->contact_phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->email }}</td>
    
    
                                </tr>
                        </tbody>
                        <hr>
                    </table>
                </div>


                <hr class="mb-5">

                <h2 class="text-orange fw-bold">Dati ordine</h2>

                <table>
                    <thead>
                        <tr>
                            <td class="p-0 pb-2">Nome</td>
                            <td class="p-0 pb-2">Quantità</td>
                            <td class="p-0 pb-2">Prezzo</td>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($order->products as $product)
                            <tr>
                                <th class="font-weight-normal">{{ $product->name }}</th>
                                <td class="text-center">{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->pivot->current_price }}&nbsp;&euro;</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr class="mb-2">
                <table>
                    <thead>
                        <tr>
                            <td class="text-orange text-center fs-4">Codice ordine</td>
                            <td class="text-orange text-center fs-4">Data</td>
                            <td class="text-orange fs-4">Totale €</td>
                            <td class="text-orange text-center fs-4">Stato pagamento</td>

                        </tr>
                    </thead>

                    <tbody>
                            <tr>
                                <th class="text-center">{{ $order->id }}</th>
                                <td class="text-center">{{ date('d/m/Y H:i', strtotime($order->order_time)) }}</td>
                                <td>{{$order->final_price}}&nbsp;&euro;</td>
                                @if ($order->paid_status)
                                    <td class="text-center"> <span class="status delivered">Pagato</span></td>
                                @else
                                    <td class="text-center"><span class="status return">Non pagato</span></td>
                                @endif

                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
