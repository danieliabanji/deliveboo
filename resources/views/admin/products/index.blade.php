@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row my-5">

    @foreach ($products as $product)

      <div class="col-4">
        <img src="{{$product->image}}" class="card-img-top" alt="..." style="height: 300px">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{$product->description}}</p>
          <h5>{{$product->price}} &euro;</h5>
          @if ($product->available == 1)
            <span class="text-success">Disponibile</span>
          @else
              <span class="text-danger">Non disponibile</span>
          @endif
          @if ($product->discount)
              <div>Lo sconto è del {{$product->discount}} %</div>
          @endif
          <div>

            <a href="#" class="btn btn-primary">Mostra prodotto</a>
            <a href="#" class="btn btn-success">Modifica</a>
            <a href="#" class="btn btn-danger">Elimina</a>

          </div>
        </div>
      </div>

    @endforeach
  </div>
</div>

@endsection
