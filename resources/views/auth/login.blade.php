@extends('layouts.app')

@section('content')
<div class="container mt-4 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card container-form">

                <div class="container">
                    <form method="POST" class="w-100 p-4" action="{{ route('login') }}">
                        @csrf

                        <h1 class="fs-1 my-4">{{ __('Login') }}</h1>

                        <div class="mb-4 w-100">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">

                            <div class="col-md-12 d-flex justify-content-center">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-center justify-content-between w-100">
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white remember" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>


                                    @if (Route::has('password.request'))
                                    <a class=" text-white" href="{{ route('password.request') }}">
                                        {{ __('Password dimenticata?') }}
                                    </a>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0 text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn my-btn">
                                    {{ __('Login') }}
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
