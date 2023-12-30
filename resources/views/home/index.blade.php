@extends('base')
@section('title', 'home')
@section('content')

    <main class="mx-auto max-w-7xl">
        <section id="hero"
            class="widescreen:section-min-height  mb-12 flex scroll-mt-40 flex-col-reverse items-center justify-center  sm:flex-row">
            <article class="sm:w-1/2">
                <h2 class="max-w-md text-center text-4xl font-bold text-slate-900 sm:text-left sm:text-5xl">
                    <span class="text-dark"> {{ __('Clinique AL FOURATE') }}</span>
                </h2>
                <p class="mt-4 max-w-md text-center text-2xl text-slate-700 dark:text-slate-400 sm:text-left">
                    {{ __('vous souhaite la bienvenue. Notre équipe se fait un plaisir de vous offrir un accueil chaleureux et des soins de santé en médecine générale de qualité.') }}
                </p>
                <a href="{{ route('patient.create') }}"
                    class="btn bg-teal-600 my-2 block w-44 hover:bg-teal-500 mx-auto sm:mx-0">{{ __('Rendez-vous en ligne') }}</a>
            </article>
            <img class="w-full sm:w-1/2" src="{{ url('images/alfourate.png') }}" alt="Rocket Dab" />
        </section>
        <hr class="mx-auto w-2/3  bg-black dark:bg-white" />

        <section id="services" class="widescreen:section-min-height  my-4 scroll-mt-20 p-6">
            <h2 class="mb-6 text-center text-4xl font-bold text-slate-900 sm:text-5xl">
                {{ __('Nos Services') }}
            </h2>
            <ul class="mx-auto my-12 flex list-none flex-col items-center gap-8 sm:flex-row">
                <li
                    class="flex w-full md:h-[320px] xl:h-[380px] flex-col items-center rounded-xl border border-solid border-slate-900 bg-white
                    shadow-xl sm:w-5/6">
                    <img src="{{ url('images/sw.png') }}" alt="Explorer" class="mb-4 w-full rounded-t-xl" />
                    <h3 class="text-center text-3xl text-slate-900 mb-4">
                        Travail Sociale
                    </h3>
                </li>
                <li
                    class="flex w-full md:h-[320px] xl:h-[380px] flex-col items-center rounded-xl border border-solid border-slate-900 bg-white
                    shadow-xl sm:w-5/6">
                    <img src="{{ url('images/doctor.png') }}" alt="Explorer" class="mb-4 w-full rounded-t-xl" />
                    <h3 class="text-center text-3xl text-slate-900 mb-4 h-1/3">
                        Prise en charges les personnes agées
                    </h3>
                </li>
                <li
                    class="flex w-full md:h-[320px] xl:h-[380px] flex-col items-center rounded-xl border border-solid border-slate-900 bg-white
                shadow-xl sm:w-5/6">
                    <img src="{{ url('images/baby.png') }}" alt="Explorer" class="mb-4 w-full rounded-t-xl" />
                    <h3 class="text-center text-3xl text-slate-900 mb-4">
                        Prise en charges les enfants
                    </h3>
                </li>
            </ul>
        </section>

        <hr class="mx-auto w-1/2 bg-black dark:bg-white" />

        <section id="localisation" class="widescreen:section-min-height  my-4 scroll-mt-20 p-6">
            <h2 class="mb-6 text-center text-4xl font-bold text-slate-900 sm:text-5xl">
                {{ __('Localisation') }}
            </h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3345.6713803035263!2d-7.634439516781923!3d33.012438305408345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda6054645aa762b%3A0xf0fba639252a566e!2sClinique%20Al%20Fourate!5e0!3m2!1sfr!2sma!4v1700334298482!5m2!1sfr!2sma"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-[300px] sm:h-[500px]"></iframe>
        </section>

        <hr class="mx-auto w-1/2 bg-black dark:bg-white" />

        <section id="politics" class="widescreen:section-min-height mt-12 scroll-mt-16 p-6">
            <h2 class="mb-6 text-center text-4xl font-bold text-slate-900 sm:text-5xl">
                {{ __('Politiques') }}
            </h2>

            <div class="slideshow-container">

                <div class="mySlides fade w-full h-[300px] sm:h-[500px] bg-teal-700">
                    <div class="numbertext">1 / 3</div>
                    <div class="text-sm md:text-xl text-white text-center px-4 sm:px-8 pt-[4rem] md:pt-[8rem]">
                        Notre personnel s’efforce de vous recevoir avec courtoisie et respect. Nous nous attendons à ce que
                        vous adoptiez cette même attitude avec notre personnel. Veuillez prendre note qu’aucune
                        manifestation de manque de respect ou de violence envers notre personnel ne sera tolérée.

                        L’équipe des médecins
                    </div>
                    <div class="text"> Courtoisie et respect
                    </div>
                </div>

                <div class="mySlides fade w-full h-[300px] sm:h-[500px] bg-teal-700">
                    <div class="numbertext">2 / 3</div>
                    <div class="text-sm md:text-xl text-white text-center px-4 sm:px-8 pt-[4rem] md:pt-[8rem]">
                        Notre personnel s’efforce de vous recevoir avec courtoisie et respect. Nous nous attendons à ce que
                        vous adoptiez cette même attitude avec notre personnel. Veuillez prendre note qu’aucune
                        manifestation de manque de respect ou de violence envers notre personnel ne sera tolérée.

                        L’équipe des médecins
                    </div>
                    <div class="text"> Courtoisie et respect
                    </div>
                </div>

                <div class="mySlides fade w-full h-[300px] sm:h-[500px] bg-teal-700">
                    <div class="numbertext">3 / 3</div>
                    <div class="text-sm md:text-xl text-white text-center px-4 sm:px-8 pt-[4rem] md:pt-[8rem]">
                        Notre personnel s’efforce de vous recevoir avec courtoisie et respect. Nous nous attendons à ce que
                        vous adoptiez cette même attitude avec notre personnel. Veuillez prendre note qu’aucune
                        manifestation de manque de respect ou de violence envers notre personnel ne sera tolérée.

                        L’équipe des médecins
                    </div>
                    <div class="text"> Courtoisie et respect
                    </div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

        </section>
    </main>


@endsection
