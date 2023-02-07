@extends('layouts.app')

@section('content')
    <section id="admin-show">
        <a class="back-btn btn btn-dark" href="{{ route('admin.products.index') }}">BACK</a>
        <div class="container">

            <h2 class="mt-3 mb-3 text-center">Aggiungi un nuovo prodotto</h2>

            <form action="{{ route('admin.products.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Add name </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" required maxlength="100">
                    @error('name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Add description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                    @error('description')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" name="image" id="image"
                        class="form-control  @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" required>
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <fieldset>
                        <legend>Disponibile o non disponibile</legend>
                        <div>
                            <input type="radio" id="available" name="available" value="1" required checked />
                            <label for="available">Disponibile</label>

                            <input type="radio" id="available" name="available" value="0" required />
                            <label for="available">Non disponibile</label>
                        </div>

                    </fieldset>
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount"
                        name="discount">
                    @error('discount')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>



                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Aggiungi</button>
                    <button type="reset" class="btn btn-danger">Resetta</button>
                </div>
            </form>
        </div>
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
    @endsection
