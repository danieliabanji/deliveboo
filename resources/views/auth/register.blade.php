@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card container-form">

                    <div class="container border-form rounded-2">

                        <form id="form1" method="POST" class="p-4" action="{{ route('register') }}">
                            @csrf
                            <h1 class="fs-1 my-4">{{ __('Registrati') }}</h1>
                            <div class="mb-4 row">
                                <div class="col-6 container-input">
                                    <input id="name" type="text"
                                        class="form-control  @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required min="3" max="100"
                                        autocomplete="name" autofocus placeholder="Nome *">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" required min="3" max="100"
                                        autocomplete="lastname" autofocus placeholder="Cognome *">
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required max="70" autocomplete="email"
                                        placeholder="Email *">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password *">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Conferma password *">
                                </div>
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


    <script>
        function submitForms() {

            document.getElementById("form1").submit();
        }
    </script>
@endsection
