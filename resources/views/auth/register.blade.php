@extends('layouts.app')

@section('content')
<div class="outer-container max-w-sm sm:max-w-md md:max-w-lg mx-auto p-3 rounded shadow-md">
    <div class="button-bg text-3xl text-center text-white max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 rounded shadow-md">{{ __('Register') }}</div>

    <form class="mt-3" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex flex-col">
            <label for="name" class="button-bg text-2xl text-center text-white max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 rounded shadow-md mt-6 w-full">{{ __('Name') }}</label>

            <div class="flex">
                <input id="name" type="text" class="bg-white text-2xl text-center text-black mx-auto mt-4 p-3 rounded shadow-md w-full mr-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="bg-white text-2xl text-bold text-red-600 text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-4 rounded shadow-md" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col">
            <label for="email" class="button-bg text-2xl text-center text-white max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 rounded shadow-md mt-6 w-full">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="bg-white text-2xl text-center text-black mx-auto mt-4 p-3 rounded shadow-md w-full mr-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                <input id="password" type="password" class="bg-white text-2xl text-center text-black mx-auto mt-4 p-3 rounded shadow-md w-full mr-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="bg-white text-2xl text-bold text-red-600 text-center max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 mt-4 rounded shadow-md" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col">
            <label for="password-confirm" class="button-bg text-2xl text-center text-white max-w-sm sm:max-w-md md:max-w-lg mx-auto px-6 py-3 rounded shadow-md mt-6 w-full">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="bg-white text-2xl text-center text-black mx-auto mt-4 p-3 rounded shadow-md w-full mr-2" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <button type="submit" class="button-bg font-bold text-2xl text-white text-center w-full max-w-sm sm:max-w-md md:max-w-lg  px-5 py-3 mt-4 rounded shadow-md">
            {{ __('Register') }}
        </button>
    </form>
</div>
@endsection