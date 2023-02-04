@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                <li><a href="">Statistiche e grafici</a></li>
                <li><a href="">index prodotti</a></li>
                <li><a href="">resoconto ordini</a></li>
                <li><a href="">bho</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
