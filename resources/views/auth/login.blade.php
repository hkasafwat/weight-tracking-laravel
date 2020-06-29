@extends('layouts.app')

@section('content')
<div class="outer-container max-w-sm sm:max-w-md md:max-w-lg mx-auto p-3 rounded shadow-md">
    <div class="button-bg text-3xl text-center text-white max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 rounded shadow-md">{{ __('Login') }}</div>

    <form class="mt-3" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-col">
            <label for="email" class="button-bg text-2xl text-center text-white max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 rounded shadow-md mt-6 w-full">{{ __('E-Mail Address') }}</label>

            <div class="flex">
                <input id="email" type="email" class="bg-white text-2xl text-center text-black mx-auto mt-4 p-3 rounded shadow-md w-full mr-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address..." autofocus>

                @error('email')
                <span class="bg-white text-2xl text-bold text-red-600 text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-4 rounded shadow-md" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col">
            <label for="password" class="button-bg text-2xl text-center text-white max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 rounded shadow-md mt-6 w-full">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="bg-white text-2xl text-center text-black mx-auto mt-4 p-3 rounded shadow-md w-full mr-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="bg-white text-2xl text-bold text-red-600 text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-4 rounded shadow-md" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col">
            <div class="mx-auto text-lg font-bold text-black mt-3 w-4/12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="flex flex-row mx-auto mt-2 font-bold text-black">
            <button type="submit" class="button-bg font-bold text-lg text-white w-5/12 text-center max-w-sm sm:max-w-md mx-auto px-5 py-3 mt-4 rounded shadow-md">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
            <a class="button-bg text-lg text-white w-5/12 text-center max-w-sm sm:max-w-md mx-auto px-5 py-3 mt-4 rounded shadow-md" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </form>
</div>
@endsection