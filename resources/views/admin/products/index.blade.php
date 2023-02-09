@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-uppercase mt-4 text-center">I tuoi prodotti</h2>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.products.create') }}" class="btn mybtn-orange mt-3">
                <i class="fa-solid fa-plus"></i> <span class="fs-5">Aggiungi un nuovo prodotto</span>
            </a>
        </div>

        <div class="row g-4 my-3">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 g-3">
                    <div class="card">
                        <div class="card-image">
                            @if (filter_var($product->image, FILTER_VALIDATE_URL))
                                <img class="img-show card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                            @elseif($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img class="img-show" src="{{ Vite::asset('resources/img/image-not-found.webp') }}"
                                    alt="image not found">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            @if ($product->description)
                                <p class="card-text">{{ Str::limit($product->description, 70) }}</p>
                            @else
                                <p class="card-text text-danger">Nessuna descrizione</p>
                            @endif

                            <h5 class="card-text">{{ $product->type->name }}</h5>
                            <h5>{{ $product->price }} &euro;</h5>
                            @if ($product->available == 1)
                                <span class="text-success">Disponibile</span>
                            @else
                                <span class="text-danger">Non disponibile</span>
                            @endif
                            @if ($product->discount)
                                <div>Lo sconto è del {{ $product->discount }} %</div>
                                @else
                                <div>Non è presente uno sconto.</div>
                            @endif
                            <div>
                                <a href="{{ route('admin.products.show', $product->slug) }}"
                                    class="btn mybtn w-100 my-2">Mostra prodotto</a>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.products.edit', $product->slug) }}"
                                        class="btn mybtn-orange">Modifica</a>
                                    <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button btn btn-danger ms-3 "
                                            data-item-title="{{ $product->name }}">Cancella</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @include('partials.modal-delete')
    </div>
@endsection
