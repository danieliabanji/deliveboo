@extends('layouts.app')

@section('content')

    <div class="container my-5">

        <div class="row">

            <div class="col-6">
                @if ($product->image)
                    <img class="img-show" src="{{$product->image}}" alt="img of {{$product->name}}">
                @else
                    <img class="img-show" src="{{Vite::asset('resources/img/image-not-found.webp')}}" alt="image not found">
                @endif

            </div>

            <div class="col-6">
                <h1 class="my-4 fw-bold">{{$product->name}}</h1>

                @if ($product->description)
                    <p>{{$product->description}}</p>
                @else
                    <p class="text-danger">Nessuna descrizione</p>
                @endif


                <h3 class="text-danger">€ {{$product->price}}</h3>

                @if ($product->available == 1)
                    <h2>Disponibile</h2>
                @else
                    <h2>Non disponibile</h2>
                @endif

                @if ($product->discount)
                    <div>Lo sconto è del {{ $product->discount }} %</div>
                @endif
            </div>

        </div>


    </div>

@endsection
