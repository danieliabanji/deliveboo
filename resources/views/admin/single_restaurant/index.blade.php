@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row my-5">
            @if (Auth::check() && Auth::user()->isAdmin())
                @foreach ($restaurants as $key => $restaurant)
                    <div class="col-4 p-5">
                        <img src="{{ $restaurant->image }}" class="card-img-top" alt="..." style="height: 300px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant->restaurant_name }}</h5>
                            <p class="card-text">{{ $restaurant->description }}</p>
                            <h5>{{ $restaurant->delivery_price }} &euro;</h5>
                            @if ($restaurant->delivery_price == 1)
                                <span class="text-success">{{ $restaurant->delivery_price }} &euro;</span>
                            @else
                                <span class="text-danger">Spedizione gratis</span>
                            @endif
                            @if ($restaurant->min_price_order)
                                <div>Ordine minimo per la consegna è di {{ $restaurant->min_price_order }}</div>
                            @else
                                <span class="text-danger">Non c'è un minimo di ordine</span>
                            @endif

                            <p class="card-text">{{ $restaurant->opening_time }}</p>
                            <p class="card-text">{{ $restaurant->closing_time }}</p>



                            <div>

                                <a href="#" class="btn btn-primary">Mostra prodotto</a>
                                <a href="#" class="btn btn-success">Modifica</a>
                                <a href="#" class="btn btn-danger">Elimina</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-4 p-5">
                    <img src="{{ $restaurants->image }}" class="card-img-top" alt="..." style="height: 300px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurants->restaurant_name }}</h5>
                        <p class="card-text">{{ $restaurants->description }}</p>
                        <h5>{{ $restaurants->delivery_price }} &euro;</h5>
                        @if ($restaurants->delivery_price == 1)
                            <span class="text-success">{{ $restaurant->delivery_price }} &euro;</span>
                        @else
                            <span class="text-danger">Spedizione gratis</span>
                        @endif
                        @if ($restaurants->min_price_order)
                            <div>Ordine minimo per la consegna è di {{ $restaurants->min_price_order }}</div>
                        @else
                            <span class="text-danger">Non c'è un minimo di ordine</span>
                        @endif

                        <p class="card-text">{{ $restaurants->opening_time }}</p>
                        <p class="card-text">{{ $restaurants->closing_time }}</p>



                        <div>

                            <a href={{ route('admin.products.index') }} class="btn btn-primary">Mostra
                                prodotti</a>
                            <a href="#" class="btn btn-success">Modifica</a>
                            <a href="#" class="btn btn-danger">Elimina</a>

                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
