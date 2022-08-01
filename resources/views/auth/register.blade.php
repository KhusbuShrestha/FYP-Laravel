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
                    <div style="background-color: #334756;" class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label style="color: #334756;" for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <input id="role" type="text" class="form-control @error('role') is-invalid @enderror"
                                        role="role" value="{{ old('role') }}" required autocomplete="role" autofocus>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="row mb-3">
                                <label style="color: #334756;" for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3"> 
                                <label style="color: #334756;" for="email" 
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label> 
 
                                <div class="col-md-6"> 
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" 
                                        name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number"> 
 
                                    @error('email') 
                                        <span class="invalid-feedback" role="alert"> 
                                            <strong>{{ $message }}</strong> 
                                        </span> 
                                    @enderror 
                                </div> 
                            </div>

                            {{-- <div class="row mb-3">
                                <label style="color: #334756;" for="phone_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="row mb-3">
                                <label style="color: #334756;" for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label style="color: #334756;" for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button">
                                       <span> {{ __('Register') }}</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
