@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card container-form">

                    <div class="container">


                        <form method="POST" class="p-4" action="{{ route('admin.single_restaurant.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <h3 class="my-4">Credenziali del tuo ristorante</h3>

                            {{-- Nome Ristorante --}}
                            <div class="mb-4 row">
                                <div class="col-12">
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}" required min="3"
                                        max="100" placeholder="Nome del ristorante *">
                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Indirizzo Ristorante --}}
                            <div class="mb-4 row">
                                <div class="col-12">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required placeholder="Indirizzo *">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Partita iva Ristorante --}}
                            <div class="mb-4">
                                <div class="col-12">
                                    <input id="p_iva" type="text"
                                        class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                                        value="{{ old('p_iva') }}" required min="5" max="11"
                                        placeholder="Partita IVA *">
                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Numero di telefono del Ristorante --}}
                            <div class="mb-4 row">
                                <div class="col-6">
                                    <input id="contact_phone" type="text"
                                        class="form-control @error('contact_phone') is-invalid @enderror"
                                        name="contact_phone" value="{{ old('contact_phone') }}" required min="5"
                                        max="15" placeholder="Numero telefonico *">
                                    @error('contact_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Costo Spedizione --}}
                                <div class="col-6">
                                    <input id="delivery_price" type="text"
                                        class="form-control @error('delivery_price') is-invalid @enderror"
                                        name="delivery_price" value="{{ old('delivery_price') }}"
                                        placeholder="Prezzo di spedizione">
                                    @error('delivery_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                {{-- Orario di Apertura --}}
                                <div class="col-6">
                                    <label for="opening-time" class="text-white">Orario di apertura <span>*</span></label>
                                    <input type="time" id="opening_time"
                                        class="form-control @error('opening_time') is-invalid @enderror" name="opening_time"
                                        value="{{ old('opening_time') }}" required placeholder="Orario di apertura">
                                    @error('opening_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Orario di Chiusura --}}
                                <div class="col-6">
                                    <label for="opening-time" class="text-white">Orario di chiusura <span>*</span></label>
                                    <input type="time" id="closing_time"
                                        class="form-control @error('closing_time') is-invalid @enderror" name="closing_time"
                                        value="{{ old('closing_time') }}" required placeholder="Orario di chiusura">
                                    @error('closing_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Prezzo minimo per l'ordine --}}
                            <div class="mb-4 row">
                                <div class="col-6">
                                    <input id="min_price_order"
                                        class="form-control @error('min_price_order') is-invalid @enderror"
                                        name="min_price_order" placeholder="Prezzo minimo per l'ordine *"
                                        value="{{ old('min_price_order') }}" type="number" name="min_price_order"
                                        max="20">
                                    @error('min_price_order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Descrizione Ristorante --}}
                            <div class="mb-4 row">
                                <div class="col-12">
                                    <textarea name="description" class="form-control" id="description" cols="50" rows="5"
                                        placeholder="Inserisci una descrizione del tuo locale"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Categorie Ristorante --}}
                            <div class="mb-3 row">
                                <label for="categories" class="form-label text-white">Categorie *</label>
                                @foreach ($categories as $category)
                                    @if (old('categories'))
                                        <div class="d-flex col-xxl-2 col-lg-3 col-md-4 col-6">
                                            <input class="me-2" type="checkbox" name="categories[]"
                                                value="{{ $category->id }}"
                                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}
                                                required>
                                            <span class="text-capitalize">{{ $category->name }}</span>
                                        </div>
                                    @else
                                        <div class="d-flex col-xxl-2 col-lg-3 col-md-4 col-6">
                                            <input class="me-2" type="checkbox" name="categories[]"
                                                value="{{ $category->id }} "
                                                {{ old('categories') ? (old('categories')->contains($category->id) ? 'checked' : '') : '' }}
                                                required>
                                            <span class="text-capitalize">{{ $category->name }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            {{-- Immagine Ristorante --}}
                            <div class="mb-3">
                                <label for="image" class="form-label text-white">Inserisci una foto del tuo ristorante
                                    <span>*</span></label>
                                <input type="file" name="image" id="image" required
                                    class="form-control  @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 row mb-0 text-center">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn my-btn">
                                        Registrati
                                    </button>
                                </div>
                            </div>

                            <p class="form-message">* Campi obbligatori</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-img-wave">
        <img src="{{ Vite::asset('resources/img/wave.svg') }}" alt="img-wave">
    </div>
@endsection
