@extends('layouts.app')

@section('content')
    <section id="admin-show">
        <div class="container">
            <a class="back-btn btn btn-dark mt-3" href="{{ route('admin.products.index') }}">BACK</a>
            <h2 class="mt-3 mb-3 text-center">Modifica il prodotto</h2>

            <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" class="py-5"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label for="name" class="form-label">Edit name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Edit description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }} </textarea>

                    @error('description')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex">
                    <div class="media me-4">
                        <img class="shadow" width="150" src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->image }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Replace products image</label>
                        <input type="file" name="image" id="image"
                            class="form-control  @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price', $product->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <fieldset>
                        <legend>Disponibile o non disponibile</legend>
                        <div>
                            <input type="radio" id="available" name="available" value="1" required
                                {{ 1 == old('available', $product->available) ? 'checked' : 'Error' }} />
                            <label for="available">Disponibile</label>

                            <input type="radio" id="available" name="available" value="0" required
                                {{ 0 == old('available', $product->available) ? 'checked' : 'Error' }} />
                            <label for="available">Non disponibile</label>
                        </div>

                    </fieldset>
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount"
                        name="discount" value="{{ old('discount', $product->discount) }}">
                    @error('discount')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mt-4">
                    <button type="submit" class="btn mybtn-orange">Aggiungi</button>
                    <button type="reset" class="btn mybtn">Resetta</button>
                </div>
            </form>
        </div>
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
    @endsection
