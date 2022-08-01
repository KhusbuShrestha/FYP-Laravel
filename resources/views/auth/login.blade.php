@extends('layouts.app')
<style>
    .container {
        left: 50%;
        top: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
    }

    .card-header {
        text-align: center;
        color: #f4f8fa;
        background-color: #334756;
        font-size: 2rem;

    }


    .button {
        display: inline-block;
        border-radius: 4px;
        background-color: #334756;
        border: none;
        color: #fafbfe;
        text-align: center;
        font-size: 18px;
        padding: 20px;
        width: 220px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;

    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        color: #fafbfe
    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
        color: #fafbfe
    }

    .button:hover span {
        padding-right: 25px;
        color: #fafbfe
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
        color: #fafbfe
    }

</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div style="background-color: #334756;" class="card-header">{{ __('LOGIN') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" style="color: #334756;"
                                    class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" style="color: #334756;"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                   
                                </div>
                            </div>
                        </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="button">
                                        <span>{{ __('Login') }}</span>
                                    </button>



                                    <a class="nav-link" style="color: #334756;"
                                        href="{{ route('register') }}">{{ __('Click here to register') }}</a>


{{-- 
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
