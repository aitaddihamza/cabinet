@extends('base')
@section('title', 'login')
@section('content')
    <section class=" flex flex-col">
        <div class="flex flex-1 items-center justify-center">
            <div class="rounded-lg sm:border-2 px-4 lg:px-24 py-16 lg:max-w-xl sm:max-w-md w-full text-center">
                @include('shared.flash')
                <form action="{{ route('doLogin') }}" method="POST" class="text-center">
                    @csrf
                    <h1 class="font-bold tracking-wider text-3xl mb-8 w-full text-gray-600">
                        {{ __('S\'authentifier') }}
                    </h1>
                    <div class="py-2 text-left ">
                        <input type="email"
                            class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                            name="email" placeholder={{ __('Addresse Email') }} />
                        @error('email')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2 text-left ">
                        <input type="password"
                            class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 
                            "
                            name="password" placeholder={{ __('Password') }} />
                        @error('password')
                            <p class="text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <button type="submit"
                            class="border-2 border-gray-100 focus:outline-none bg-teal-600 text-white font-bold tracking-wider block w-full p-2 rounded-lg focus:border-gray-700 hover:bg-teal-700">
                            {{ __('connexion') }}
                        </button>
                    </div>
                </form>
                <div class="text-center">
                    <a href="#" class="hover:underline">{{ __('Mot de passe oublié ?') }}</a>
                </div>
                <div class="text-center mt-8">
                    <span>
                        {{ __('vous n\'avez pas un compte ?') }}
                    </span>
                    <a href="{{ route('register') }}"
                        class=" text-md text-indigo-600 underline font-semibold hover:text-indigo-800">{{ __('Créer un') }}
                    </a>
                </div>
            </div>
        </div>
    </section>



@endsection
