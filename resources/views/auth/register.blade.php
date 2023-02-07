@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card container-form">

                <div class="container">


                        {{-- <form id="form1" method="POST" class="p-4" action="{{ route('register') }}">
                            @csrf

                            <h1 class="fs-1 my-4">{{ __('Register') }}</h1>
                            <div class="mb-4 row">




                                <div class="col-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required min="3" max="100" autocomplete="name" autofocus placeholder="Nome">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required min="3" max="100" autocomplete="lastname" autofocus placeholder="Cognome">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-4 row">


                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required max="70" autocomplete="email" placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">


                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Conferma password">
                                </div>

                            </div>

                        </form> --}}

                        <form id="form2" method="POST" class="p-4" action="{{ route('admin.single_restaurant.store') }}">
                              {{-- credenziali per il ristorante --}}
                              @csrf

                            <h3 class="my-4">Credenziali del tuo ristorante</h3>

                            <div class="mb-4 row">
                                <div class="col-12">
                                   <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required min="3" max="100" autocomplete="restaurant_name" autofocus placeholder="Nome del ristorante">

                                   @error('restaurant_name')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                               </div>
                           </div>

                            <div class="mb-4 row">
                                 <div class="col-12">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Indirizzo">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                             <div class="mb-4">
                                {{-- <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>--}}

                                <div class="col-12">
                                    <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" required min="11" max="11" autocomplete="p_iva" autofocus placeholder="Partita IVA">

                                    @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-4 row">
                                <div class="col-6">
                                   <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required min="5" max="15" autocomplete="phone_number" autofocus placeholder="Numero telefonico">

                                   @error('phone_number')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                               </div>

                               <div class="col-6">
                                    <input id="delivery_price" type="text" class="form-control @error('delivery_price') is-invalid @enderror" name="delivery_price" value="{{ old('delivery_price') }}" autocomplete="delivery_price" autofocus placeholder="Prezzo di spedizione">

                                    @error('delivery_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                           </div>


                           <div class="mb-4 row">
                            <div class="col-6">
                                <label for="opening-time" class="text-white">Orario di apertura</label>
                                <input type="time" id="opening_time" class="form-control @error('opening_time') is-invalid @enderror" name="opening_time" value="{{ old('opening_time') }}" required autocomplete="opening_time" autofocus placeholder="Orario di apertura">


                                @error('opening_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                           <div class="col-6">
                                <label for="opening-time" class="text-white">Orario di chiusura</label>
                                <input type="time" id="closing_time" class="form-control @error('closing_time') is-invalid @enderror" name="closing_time" value="{{ old('closing_time') }}" required autocomplete="closing_time" autofocus placeholder="Orario di chiusura">

                                @error('closing_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            </div>

                            <div class="mb-4 row">
                                    <div class="col-6">

                                        <label for="opening-time" class="text-white">Prezzo minimo per l'ordine</label>
                                        <input id="min_price_order" class="form-control @error('min_price_order') is-invalid @enderror" name="min_price_order" value="{{ old('min_price_order') }}" autocomplete="min_price_order" autofocus type="number" name="min_price_order" max="20">

                                        @error('min_price_order')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                            </div>

                            <div class="mb-4 row">
                                    <div class="col-12">
                                        <textarea name="description" class="form-control id="description" cols="50" rows="5" placeholder="Inserisci un descrizione del tuo locale"></textarea>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                            <div class="mb-3">

                                <label for="image" class="form-label text-white">Inserisci una foto del tuo ristorante</label>
                                <input type="file" name="image" id="image" required class="form-control  @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                            </div>


                        </form>

                        <div class="mb-4 row mb-0 text-center">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn my-btn" onclick="submitForms()">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-img-wave">
    <img src="{{ Vite::asset('resources/img/wave.svg') }}" alt="img-wave">
</div>


<script>
    function submitForms() {
        // document.getElementById("form1").submit();
        document.getElementById("form2").submit();
    }
</script>

@endsection
