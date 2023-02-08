@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <a class="back-btn btn btn-dark mb-2" href="{{ route('admin.products.index') }}">BACK</a>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                @if (filter_var($product->image, FILTER_VALIDATE_URL))
                    <img class="img-show" src="{{ $product->image }}" alt="{{ $product->name }}" style="width:100%;">
                @elseif($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width:100%;">
                @else
                    <img class="img-show" src="{{ Vite::asset('resources/img/image-not-found.webp') }}"
                        alt="image not found" style="width:100%;">
                @endif

            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h1 class="my-4 fw-bold">{{ $product->name }}</h1>

                @if ($product->description)
                    <p>{{ $product->description }}</p>
                @else
                    <p class="text-danger">Nessuna descrizione</p>
                @endif


                <h3 class="text-danger">€ {{ $product->price }}</h3>

                @if ($product->available == 1)
                    <h2>Disponibile</h2>
                @else
                    <h2>Non disponibile</h2>
                @endif

                @if ($product->discount)
                    <div>Lo sconto è del {{ $product->discount }} %</div>
                @endif

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.products.edit', $product->slug) }}" class="btn mybtn-orange">Modifica</a>
                    <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3"
                            data-item-title="{{ $product->name }}">Delete</button>
                    </form>

                </div>
            </div>

        </div>


        @include('partials.modal-delete')
    </div>
@endsection
