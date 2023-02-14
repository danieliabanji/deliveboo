@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header mycard-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Benvenuto') }} {{ $restaurants->restaurant_name }}<span>!</span>
                        <div>
                            <div>
                                @if (filter_var($restaurants->image, FILTER_VALIDATE_URL))
                                    <img class="img-show card-img-top" src="{{ $restaurants->image }}"
                                        alt="img of {{ $restaurants->restaurant_name }}" style="width:100%">
                                @elseif($restaurants->image)
                                    <img src="{{ asset('storage/' . $restaurants->image) }}"
                                        alt="img of {{ $restaurants->restaurant_name }}" style="width:100%">
                                @else
                                    <img class="img-show" src="{{ Vite::asset('resources/img/image-not-found.webp') }}"
                                        alt="image not found" style="width:100%">
                                @endif
                            </div>

                        </div>
                        <div class="mt-3">
                            @if (Auth::user()->restaurant)
                                <a href="{{ route('admin.single_restaurant.index') }}"
                                    class="btn mybtn-orange mt-1 mr-1 mb-1">Dati Ristorante</a>
                                <a href="{{ route('admin.products.index') }}" class="btn mybtn-orange mt-1 mr-1 mb-1">Index
                                    prodotti</a>
                                <a href="#" class="btn mybtn-orange mt-1 mr-1 mb-1">Statistiche e grafici</a>
                                <a href="{{ route('admin.orders.index') }}"
                                    class="btn mybtn-orange mt-1 mr-1 mb-1">Resoconto ordini</a>
                                @if (Auth::check() && Auth::user()->isAdmin())
                                    <a href="{{ route('admin.categories.index') }}"
                                        class="btn mybtn-orange mt-1 mr-1 mb-1">index categorie</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    @if (Auth::user()->restaurant)
                        <li><a href="{{ route('admin.single_restaurant.index') }}">Dati Ristorante</a></li>
                        <li><a href="">Statistiche e grafici</a></li>
                        <li><a href="{{ route('admin.products.index') }}">index prodotti</a></li>
                        <li><a href="">resoconto ordini</a></li>
                        @if (Auth::check() && Auth::user()->isAdmin())
                            <li><a href="{{ route('admin.categories.index') }}">index categorie</a></li>
                        @endif

                        <li><a href="">bho</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </div> --}}
@endsection
