@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus">crea</i>
        </a>
        <div class="row my-5">
            @foreach ($products as $product)
                <div class="col-4 p-5">
                    <img src="{{ $product->image }}" class="card-img-top" alt="..." style="height: 300px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
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

                            <a href="{{ route('admin.products.show', $product->slug) }}" class="btn btn-primary">Mostra
                                prodotto</a>
                            <a href="{{ route('admin.products.edit', $product->slug) }}"
                                class="btn btn-success">Modifica</a>
                            <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button btn btn-danger ms-3"
                                    data-item-title="{{ $product->name }}">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
