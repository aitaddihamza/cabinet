@extends('base')
@section('title', 'rendez-vous')
@section('content')

    <form action="{{ route($reservation->exists ? 'patient.update' : 'patient.store', $reservation) }}" method="POST"
        class="flex-1 mx-auto max-w-6xl  border border-solid p-4  rounded-xl shadow-sm">
        @csrf
        @method($reservation->exists ? 'PUT' : 'POST')
        <h1 class="font-bold tracking-wider text-xl mb-8 w-full text-gray-600  text-center">
            {{ __('S\'inscrire pour prendre un rendez-vous') }}
        </h1>
        @include('shared.flash')
        <div class="flex items-center justify-between gap-2">
            <div class="flex flex-col flex-1">
                <div class="flex flex-col">
                    <label for="specialite">Spécialité</label>
                    <select name="specialite" id="specialite" class="border border-solid p-2 rounded">
                        <option value="">Choisir </option>
                        @forelse($specialites as $item)
                            <option value="{{ $item->specialite }}" @selected($reservation->specialite)>
                                {{ $item->specialite }}
                            </option>
                        @empty
                            <option value="">no specialites</option>
                        @endforelse
                    </select>
                </div>
                @error('specialite')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col flex-1">
                <div class="flex flex-col">
                    <label for="date_reservation">Date de réservation</label>
                    <input type="date" name="date_reservation" id="date_reservation"
                        class="border border-solid p-2 rounded"
                        value="{{ old('date_reservation', $reservation->date_reservation) }}">
                </div>
                @error('date_reservation')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-between gap-2">
            <div class="flex flex-col flex-1 mt-2">
                <div class="flex flex-col">
                    <label for="description">Déscription </label>
                    <textarea name="description" id="description" cols="30" rows="5" class="border border-solid rounded p-2"
                        placeholder="Consultation ">{{ old('description', $reservation->description) }} </textarea>
                </div>
                @error('description')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-col">
            <h1 class="font-medium text-xl mb-2">Heure de rendez-vous &#128336;</h1>
            <div class="flex justify-between md:gap-12 md:justify-start items-center">
                <div class="flex flex-col">
                    <h1 class="font-medium ">Matin </h1>
                    <div>
                        <input type="radio" name="heure_reservation" id="9:00" value="9:00">
                        <label for="9:00">9:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="9:15" value="9:15">
                        <label for="9:15">9:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="9:30" value="9:30">
                        <label for="9:30">9:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="9:45" value="9:45">
                        <label for="9:45">9:45</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="10:00" value="10:00">
                        <label for="10:00">10:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="10:15" value="10:15">
                        <label for="10:15">10:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="10:30" value="10:30">
                        <label for="10:30">10:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="10:45" value="10:45">
                        <label for="10:45">10:45</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="11:00" value="11:00">
                        <label for="11:00">11:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="11:15" value="11:15">
                        <label for="11:15">11:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="11:30" value="11:30">
                        <label for="11:30">11:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="11:45" value="11:45">
                        <label for="11:45">11:45</label>
                    </div>
                </div>
                <div class="flex flex-col ">
                    <h1 class="font-medium ">Après-midi </h1>
                    <div>
                        <input type="radio" name="heure_reservation" id="12:00" value="12:00">
                        <label for="12:00">12:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="12:15" value="12:15">
                        <label for="12:15">12:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="12:30" value="12:30">
                        <label for="12:30">12:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="12:45" value="12:45">
                        <label for="12:45">12:45</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="13:00" value="13:00">
                        <label for="13:00">13:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="13:15" value="13:15">
                        <label for="13:15">13:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="13:30" value="13:30">
                        <label for="13:30">13:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="13:45" value="13:45">
                        <label for="13:45">13:45</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="14:00" value="14:00">
                        <label for="14:00">14:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="14:15" value="14:15">
                        <label for="14:15">14:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="14:30" value="14:30">
                        <label for="14:30">14:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="14:45" value="14:45">
                        <label for="14:45">14:45</label>
                    </div>
                </div>
                <div class="flex flex-col ">
                    <h1 class="font-medium ">Soir </h1>
                    <div>
                        <input type="radio" name="heure_reservation" id="15:00" value="15:00">
                        <label for="15:00">15:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="15:15" value="15:15">
                        <label for="15:15">15:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="15:30" value="15:30">
                        <label for="15:30">15:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="15:45" value="15:45">
                        <label for="15:45">15:45</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="16:00" value="16:00">
                        <label for="16:00">16:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="16:15" value="16:15">
                        <label for="16:15">16:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="16:30" value="16:30">
                        <label for="16:30">16:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="16:45" value="16:45">
                        <label for="16:45">16:45</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="17:00" value="17:00">
                        <label for="17:00">17:00</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="17:15" value="17:15">
                        <label for="17:15">17:15</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="17:30" value="17:30">
                        <label for="17:30">17:30</label>
                    </div>
                    <div>
                        <input type="radio" name="heure_reservation" id="17:45" value="17:45">
                        <label for="17:45">17:45</label>
                    </div>
                </div>
            </div>
            @error('heure_reservation')
                <p class="text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="mx-auto mt-2 flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-800  focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                <path d="M0 0h24v24H0V0z" fill="none"></path>
                <path d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z"
                    opacity=".3"></path>
                <path
                    d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z">
                </path>
            </svg>
            <span class="pl-2 mx-1">Réserver</span>
        </button>
    </form>

@endsection
