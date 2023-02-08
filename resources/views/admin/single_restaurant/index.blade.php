@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row my-5">
            @if (Auth::check() && Auth::user()->isAdmin())
                @foreach ($restaurants as $key => $restaurant)
                    <div class="col-4 p-5">

                        @if (filter_var($restaurant->image, FILTER_VALIDATE_URL))
                            <img class="img-show card-img-top" src="{{ $restaurant->image }}"
                                alt="img of {{ $restaurant->restaurant_name }}">
                        @elseif($restaurant->image)
                            <img src="{{ asset('storage/' . $restaurant->image) }}"
                                alt="img of {{ $restaurant->restaurant_name }}">
                        @else
                            <img class="img-show" src="{{ Vite::asset('resources/img/image-not-found.webp') }}"
                                alt="image not found">
                        @endif
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

                                <a href="#" class="btn mybtn-orange">Mostra prodotto</a>
                                <a href="#" class="btn mybtn">Modifica</a>
                                <a href="#" class="btn btn-danger">Elimina</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-4 p-5">
                    @if (filter_var($restaurants->image, FILTER_VALIDATE_URL))
                        <img class="img-show card-img-top" src="{{ $restaurants->image }}"
                            alt="img of {{ $restaurants->restaurant_name }}">
                    @elseif($restaurants->image)
                        <img src="{{ asset('storage/' . $restaurants->image) }}"
                            alt="img of {{ $restaurants->restaurant_name }}">
                    @else
                        <img class="img-show" src="{{ Vite::asset('resources/img/image-not-found.webp') }}"
                            alt="image not found">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurants->restaurant_name }}</h5>
                        <p class="card-text">{{ $restaurants->description }}</p>
                        {{-- <h5>{{ $restaurants->delivery_price }} &euro;</h5> --}}
                        <div>
                            @if ($restaurants->delivery_price == null)
                                <span class="text-success">Spedizione gratis</span>
                            @elseif ($restaurants->delivery_price !== null)
                                <span class="text-success">{{ $restaurants->delivery_price }} &euro;</span>
                            @endif
                        </div>
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
                            {{-- <a href="#" class="btn btn-success">Modifica</a>
                            <a href="#" class="btn btn-danger">Elimina</a> --}}

                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
