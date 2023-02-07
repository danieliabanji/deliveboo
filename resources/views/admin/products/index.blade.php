@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus">crea</i>
        </a>
        <div class="row my-5">
            @foreach ($products as $product)
                <div class="col-4 p-5">

                    @if ($product->image)
                        <img class="card-img-top" alt="..." style="height: 300px" src="{{$product->image}}" alt="img of {{$product->name}}">
                    @else
                        <img class="card-img-top" alt="..." style="height: 300px" src="{{Vite::asset('resources/img/image-not-found.webp')}}" alt="image not found">
                    @endif


                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>

                        @if ($product->description)
                            <p class="card-text">{{$product->description}}</p>
                        @else
                            <p class="card-text text-danger">Nessuna descrizione</p>
                        @endif


                        <h5>{{ $product->price }} &euro;</h5>
                        @if ($product->available == 1)
                            <span class="text-success">Disponibile</span>
                        @else
                            <span class="text-danger">Non disponibile</span>
                        @endif
                        @if ($product->discount)
                            <div>Lo sconto è del {{ $product->discount }} %</div>
                        @endif
                        <div>

                            <a href="{{ route('admin.products.show', $product->slug) }}" class="btn btn-primary w-100 my-2">Mostra prodotto</a>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.products.edit', $product->slug) }}"
                                    class="btn btn-success">Modifica</a>
                                <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{ $product->name }}">Delete</button>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        @include('partials.modal-delete')

    </div>
@endsection
