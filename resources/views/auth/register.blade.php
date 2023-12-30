@extends('base')
@section('title', __('inscription'))
@section('content')

    <section class=" flex flex-col max-w-4xl mx-auto">
        <div class="flex flex-1 items-center justify-center">
            <div class="rounded-lg sm:border-2 px-4 lg:px-24 py-6  w-full text-center">
                <form action="{{ route('doRegister') }}" method="POST" class="text-center">
                    @csrf
                    <h1 class="font-bold tracking-wider text-xl mb-8 w-full text-gray-600 ">
                        {{ __('S\'inscrire pour prendre un rendez-vous') }}
                    </h1>

                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="firstname" value="{{ old('firstname') }}" placeholder="Nom" />
                            @error('firstname')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="lastname" value="{{ old('lastname') }}" placeholder="Prénom" />
                            @error('lastname')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="address" value="{{ old('address') }}" placeholder="Addresse" />
                            @error('address')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex  md:flex-row items-center gap-2">
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="cin" value="{{ old('cin') }}" placeholder="cin" />
                            @error('cin')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="phone" value="{{ old('phone') }}" placeholder="Téléphone" />
                            @error('phone')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="py-2 text-left">
                        <input type="email"
                            class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                            name="email" value="{{ old('email') }}" placeholder="Email" />
                        @error('email')
                            <p class="text-red-600"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <div class="py-2 text-left flex-1 flex md:flex-row items-center gap-2">
                            <input type="password"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="password" placeholder="Mot de passe " />
                            <input type="password"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="password_confirmation" placeholder="confirmation de mot de passe " />
                        </div>
                        @error('password')
                            <p class="text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <button type="submit"
                            class="w-40 mx-auto border-2 border-gray-100 focus:outline-none bg-teal-600 text-white font-bold tracking-wider block p-2 rounded-lg focus:border-gray-700 hover:bg-teal-700">
                            {{ __('s\'inscrire ') }}
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <span>
                        {{ __('vous avez déjà un compte? ') }}
                    </span>
                    <a href="{{ route('login') }}"
                        class=" text-md text-indigo-600 underline font-semibold hover:text-indigo-800">{{ __('Connexion') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
