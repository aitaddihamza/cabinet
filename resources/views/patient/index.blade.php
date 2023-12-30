@extends('base')
@section('title', 'patient home page ')
@section('content')

    <div class="flex flex-col gap-4 mt-4  max-w-7xl mx-auto">
        @include('shared.flash')
        @if (!$reservation)
            <div class="flex flex-col sm:flex-row items-center justify-between md:justify-start gap-8 mt-8 max-w-6xl p-4">
                <h1 class=" my-2 font-medium text-md sm:text-2xl">Prendre un rendez-vous en ligne </h1>
                <a href="{{ route('patient.create') }}" class="btn-primary w-40">{{ __('Rendez-vous') }}</a>
            </div>
        @else
            <h1 class="text-xl md:text-2xl font-medium">Vous avez un rendez-vous le <span
                    class="text-red-600">{{ $reservation->date_reservation }}</span></h1>
            <div class="flex flex-col justify-center border border-solid rounded p-2 md:text-xl">
                <div class="flex justify-between items-center p-2">
                    <div>Nom: </div>
                    <div>{{ Auth::user()->firstname }} </div>
                </div>
                <hr>
                <div class="flex justify-between items-center p-2">
                    <div>Prénom: </div>
                    <hr>
                    <div>{{ Auth::user()->lastname }} </div>
                </div>
                <hr>
                <div class="flex justify-between items-center p-2">
                    <div>Cin: </div>
                    <div>{{ Auth::user()->cin }} </div>
                </div>
                <hr>
                <div class="flex justify-between items-center p-2">
                    <div>Téléphone: </div>
                    <div>{{ Auth::user()->phone }} </div>
                </div>
                <hr>
                <div class="flex justify-between items-center p-2">
                    <div>Email: </div>
                    <div>{{ Auth::user()->email }} </div>
                </div>
                <hr>
                <div class="flex justify-between items-center p-2">
                    <div>Spécialité: </div>
                    <div>{{ Auth::user()->reservation->specialite }} </div>
                </div>
                <hr>
                <div class="flex justify-between items-center p-2">
                    <div>Date de réservation: </div>
                    <div class="text-red-600 font-medium">{{ Auth::user()->reservation_date() }} </div>
                </div>
                <hr>
                <div class="flex justify-between items-center p-2">
                    <div>Heure de réservation: </div>
                    <div class="text-red-600 font-medium">{{ Auth::user()->time() }} </div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('patient.edit', $reservation) }}" class="btn-primary">Modifier rdv</a>
                <form action="{{ route('patient.destroy', $reservation) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-red-600">Annuler rdv</button>
                </form>
            </div>
        @endif

    </div>

@endsection
