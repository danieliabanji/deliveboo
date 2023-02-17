@extends('layouts.app')


@section('content')

<div class="container-wave-index-orders">

</div>

<div class="container blocco-orders-index">

    <div class="row">

        {{-- <div class="col-sm-12 col-md-4 col-sm-4">
            <div class="box-content d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-orange numbers">1,504</div>
                    <div class="cardName">Visite giornaliere</div>
                </div>
                <div>
                    <i class="fa-solid fa-eye"></i>
                </div>

            </div>
        </div> --}}

        <div class="col-sm-12 col-md-6 col-sm-6">
            <div class="box-content d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-orange numbers">{{ count($orders) }}</div>
                <div class="cardName">Vendite</div>
                </div>
                <div>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-sm-6">
            <div class="box-content d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-orange numbers">€ {{ $orders->reduce(function ($total, $order) {
                        return $total + $order->final_price;
                    }) }}</div>
                    <div class="cardName">Guadagno</div>
                </div>
                <div>
                    <i class="fa-solid fa-money-bill"></i>
                </div>

            </div>
        </div>


    </div>

</div>



    <div class="details mt-5">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2 class="text-orange">Ordini recenti</h2>
                <a href="{{route('admin.stats')}}" class="btn mybtn-orange">Vedi i grafici</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Codice ordine</td>
                        <td>Nome</td>
                        <td>Cognome</td>
                        <td class="d-none-resp">Codice cliente</td>
                        <td class="d-none-resp">Telefono</td>
                        <td class="d-none-resp">Email</td>
                        <td class="d-none-resp">Indirizzo</td>
                        <td class="d-none-resp">Data</td>
                        <td class="d-none-resp">Totale €</td>
                        <td class="d-none-resp">Stato pagamento</td>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)

                        <tr>

                            <td>
                                <a class="btn mybtn" href="{{ route('admin.orders.show', $order->order_code) }}">{{ $order->order_code }}</a>
                            </td>

                            <td class="text-start">{{ $order->customer_name }}</td>
                            <td class="text-start">{{ $order->customer_lastname }}</td>
                            <th class="text-center d-none-resp">{{ $order->id }}</th>
                            <td class="d-none-resp">{{ $order->contact_phone }}</td>
                            <td class="d-none-resp">{{ $order->email }}</td>
                            <td class="d-none-resp">{{ $order->address }}</td>
                            <td class="d-none-resp">{{ date('d/m/Y H:i', strtotime($order->order_time)) }}</td>
                            <td class="d-none-resp">{{ $order->final_price }}&nbsp;&euro;</td>
                            @if ($order->paid_status)
                                <td style="text-align: center;" class="d-none-sm"> <span class="status delivered">Pagato</span></td>
                            @else
                                <td style="text-align: center;" class="d-none-sm"><span class="status return">Non pagato</span></td>
                            @endif

                        </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
