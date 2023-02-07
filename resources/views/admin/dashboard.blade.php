@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container">

        <div class="row">

            <div class="col">

                <ul>
                    <li><a href="{{ route('admin.single_restaurant.create') }}">crea Ristorante</a></li>

                    <li><a href="{{ route('admin.single_restaurant.index') }}">Dati Ristorante</a></li>
                    <li><a href="">Statistiche e grafici</a></li>
                    <li><a href="{{ route('admin.products.index') }}">index prodotti</a></li>
                    <li><a href="">resoconto ordini</a></li>
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <li><a href="{{ route('admin.categories.index') }}">index categorie</a></li>
                    @endif

                    <li><a href="">bho</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
