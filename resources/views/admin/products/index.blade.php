@extends('layouts.app')

@section('content')

<div class="container">

   <div class="row my-5">

        @foreach ($products as $product)

        <div class="col-4">
            <img src="{{$product->image}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->description}}</p>
              <h5>{{$product->price}}</h5>

              @if ($product->available == 1)
              <span>Disponibile</span>

            @else
                <span>Non disponibile</span>
            @endif

            @if ($product->discount)

                <div>Lo sconto è {{$product->discount}} %</div>

            @endif

              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>



        @endforeach
   </div>
</div>

@endsection
