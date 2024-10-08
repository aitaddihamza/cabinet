@extends('base')
@section('title', __('Nouveau medecin'))
@section('content')

    <section class=" flex flex-col max-w-7xl mx-auto mt-2">
        <div class="flex flex-1 items-center justify-center">
            <div class=" w-full text-center">
                <form action="{{ route($doctor->exists ? 'admin.update' : 'admin.store', ['doctor' => $doctor]) }}"
                    method="POST" class="text-center">
                    @csrf
                    @method($doctor->exists ? 'PUT' : 'POST')
                    <h1 class="font-bold tracking-wider text-xl xl:text-2xl mb-8 w-full text-gray-600 ">
                        {{ $doctor->exists ? __('Modifier un médecin ') : __('Ajouter un nouveau médecin ') }}
                    </h1>

                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="firstname" value="{{ old('firstname', $doctor->firstname) }}" placeholder="Nom" />
                            @error('firstname')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="lastname" value="{{ old('lastname', $doctor->lastname) }}" placeholder="Prénom" />
                            @error('lastname')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex  md:flex-row items-center gap-2">
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="cin" value="{{ old('cin', $doctor->cin) }}" placeholder="cin" />
                            @error('cin')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="phone" value="{{ old('phone', $doctor->phone) }}" placeholder="Téléphone" />
                            @error('phone')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex  md:flex-row items-center gap-2">
                        <div class="py-2 text-left flex-1">
                            <input type="text"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="specialite" value="{{ old('specialite', $doctor->specialite) }}"
                                placeholder="Spécialité" />
                            @error('specialite')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="py-2 text-left flex-1">
                            <input type="email"
                                class="border-2 border-gray-100 focus:outline-none bg-gray-100 block w-full py-2 px-4 rounded-lg focus:border-gray-700 "
                                name="email" value="{{ old('email', $doctor->email) }}" placeholder="Email" />
                            @error('email')
                                <p class="text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
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
                            class=" mt-2 flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize   bg-black rounded-md hover:bg-gray-800  focus:outline-none focus:bg-gray-900  transition duration-300 transform active:scale-95 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                fill="#FFFFFF">
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path
                                    d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z"
                                    opacity=".3"></path>
                                <path
                                    d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z">
                                </path>
                            </svg>
                            <span class="pl-2 mx-1">Enregistrer</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
