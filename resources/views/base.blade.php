<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>@yield('title')</title>
    <script src="{{ url('js/main.js') }}" defer></script>
</head>

@php

    $isArabic = App::getLocale() == 'ar';

@endphp

<body class="min-h-screen flex flex-col ">
    <div class="bg-black">
        <ul @class([
            'max-w-7xl mx-auto hidden xl:flex items-center gap-2 text-white p-4',
            'justify-end' => $isArabic,
        ])>
            <li class="flex items-center gap-2"><i class="fa fa-envelope"></i>clqalfouratepec@gmail.com</li>
            <li>|</li>
            <li class="flex items-center gap-2"><i class="fa fa-map"></i>{{ __('Hay Al Ouahda, Farah I, Settat') }}</li>
        </ul>
    </div>
    <header class="sticky top-0 z-10 bg-teal-700 text-white">
        <section @class([
            'mx-auto flex  max-w-7xl items-center justify-between p-4',
            'flex-row-reverse' => $isArabic,
        ])>
            <div class="flex items-end gap-8">
                <h1 @class(['text-2xl font-medium', 'order-2' => $isArabic])>
                    <a href="/">{{ __('Clinique AL FOURATE') }}</a>
                </h1>
                @auth
                    <a href="{{ route(Auth::user()->role . '.index') }}"
                        class="text-xl hidden md:block">{{ __('Principale') }}</a>
                @endauth
            </div>
            <div>
                <button id="hamburger-button" class="relative h-8 w-8 cursor-pointer text-3xl md:hidden">
                    <div
                        class="absolute top-4 -mt-0.5 h-1 w-8 rounded bg-white transition-all duration-500 before:absolute before:h-1 before:w-8 before:-translate-x-4 before:-translate-y-3 before:rounded before:bg-white before:transition-all before:duration-500 before:content-[''] after:absolute after:h-1 after:w-8 after:-translate-x-4 after:translate-y-3 after:rounded after:bg-white after:transition-all after:duration-500 after:content-[''] toggle-btn">
                    </div>
                </button>
                <nav class="hidden space-x-8 text-xl md:flex " aria-label="main">
                    @auth
                        <h1 class="hover:opacity-90">{{ Auth::user()->firstname }}</h1>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ __('Déconnexion') }}</button>
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('patient.create') }}" class="hover:opacity-90">&#128198;
                            {{ __('Rendez-vous') }}</a>
                        <a href="{{ route('register') }}" class="hover:opacity-90">{{ __('S\'inscrire') }}</a>
                        <a href="{{ route('login') }}" class="hover:opacity-90">{{ __('S\'authentifier') }}</a>
                    @endguest
                </nav>
            </div>
        </section>
        <section id="mobile-menu"
            class="top-68 justify-center absolute hidden w-full origin-top animate-open-menu flex-col bg-teal-500 text-3xl">
            {{-- <button class="text-8xl self-end px-6">
                &times;
            </button> --}}
            <nav class="flex min-h-screen flex-col items-center py-8" aria-label="mobile">
                <a href="/" class="w-full py-6 text-center hover:opacity-90">Acceuil</a>
                @auth
                    <a href="{{ route(Auth::user()->role . '.index') }}"
                        class="w-full py-6 text-center hover:opacity-90">Principale</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full py-6 text-center hover:opacity-90">{{ __('Déconnexion') }}</button>
                    </form>
                @endauth
                @guest

                    <a href="{{ route('patient.create') }}" class="w-full py-6 text-center hover:opacity-90">&#128198;
                        {{ __('Rendez-vous') }}</a>
                    <a href="{{ route('login') }}"
                        class="w-full py-6 text-center hover:opacity-90">{{ __('Connexion') }}</a>
                    <a href="{{ route('register') }}"
                        class="w-full py-6 text-center hover:opacity-90">{{ __('S\'inscrire ') }}</a>
                @endguest
            </nav>
        </section>
    </header>
    <main class="flex-1 p-4">
        @yield('content')
    </main>

    <footer id="footer" class="bg-teal-700 text-xl text-white">
        <section @class([
            'mx-auto flex  max-w-7xl flex-col p-4 sm:flex sm:justify-between',
            'flex-col-reverse sm:flex-row-reverse',
        ])>
            <address>
                <h2>{{ __('Clinique AL FOURATE') }}</h2>
                {{ __('Hay Al Ouahda, Farah I, Settat') }}<br />
                <div @class(['flex items-center gap-2', 'flex-row-reverse' => $isArabic])>
                    <span>{{ __('Email') }} <span>:</span> </span><a
                        href="mailto:cliniquealfourate@alfourate.com">clqalfouratepec@gmail.com</a><br />
                </div>
                <div @class(['flex items-center gap-2', 'flex-row-reverse' => $isArabic])>
                    <span>{{ __('Téléphone') }} <span>:</span> </span><a href="tel:+15555555555">0523722372</a>
                </div>
            </address>
            <nav class="hidden flex-col gap-2 md:flex" aria-label="footer">
                <a href="#services" class="hover:opacity-90">{{ __('Nos Services') }}</a>
                <a href="#localisation" class="hover:opacity-90">{{ __('Localisation') }} </a>
                <a href="#politics" class="hover:opacity-90">{{ __('Politiques') }}</a>
            </nav>
            <div class="flex flex-col sm:gap-2 mt-6">

                <div class="flex items-center gap-2 justify-end mb-2">
                    <a href="/convertLang/ar" class="text-right">
                        <img src="{{ asset('images/ar.png') }}" width="40px" height="40px">
                    </a>
                    <a href="/convertLang/fr" class="text-right">
                        <img src="{{ asset('images/fr.png') }}" width="30px" height="24px">
                    </a>
                </div>
                <p class="text-right">{{ __('Copyright') }} &copy; {{ __('by') }} {{ __('AL FOURATE') }} <span
                        id="year">2023</span></p>
                <p class="text-right">{{ __('Tous droits réservés') }}</p>
            </div>
        </section>
    </footer>
</body>

</html>
