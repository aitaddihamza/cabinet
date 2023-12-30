@extends('base')
@section('title', 'Doctor ')
@section('content')

    <div class="flex flex-col max-w-7xl mx-auto mt-2 overflow-x-auto">
        <form action="" method="GET" class="flex items-center gap-2">
            @csrf
            <input type="text" class="border border-solid p-2 rounded " name="firstname" placeholder="prénom"
                value="{{ $inputs['firstname'] ?? '' }}">
            <input type="text" class="border border-solid p-2 rounded " name="cin" placeholder="cin"
                value="{{ $inputs['cin'] ?? '' }}">
            <input type="text" class="border border-solid p-2 rounded " name="phone" placeholder="phone"
                value="{{ $inputs['phone'] ?? '' }}">
            <input type="date" class="border border-solid p-2 rounded " name="date_reservation"
                placeholder="date réservation" value="{{ $inputs['date_reservation'] ?? '' }}">
            <input type="time" class="border border-solid p-2 rounded " name="heure_reservation"
                placeholder="heure réservation" value="{{ $inputs['heure_reservation'] ?? '' }}">
            <button class="btn bg-black">Rechercher</button>
        </form>
        @include('shared.flash')
        <h1 class="text-xl font-medium my-4">Tous les patients </h1>
        <table class="min-w-full divide-y divide-gray-200 mt-4">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Addresse
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cin</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date réservation
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Heure réservation
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Déscription
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($patients as $patient)
                    <tr class="hover:bg-papayawhip text-sm">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $patient->firstname }} </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $patient->lastname }} </td>
                        <td class="px-6 py-4 whitespace-nowrap" title="{{ $patient->address }}">
                            @if (strlen($patient->address) <= 24)
                                {{ $patient->address }}
                            @else
                                {{ substr($patient->address, 0, 24) }}
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-red-600">{{ $patient->cin }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $patient->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $patient->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-red-600">{{ $patient->date_reservation }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-red-600">
                            {{ date('H:i', strtotime($patient->heure_reservation)) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap" title="{{ $patient->description }}">
                            @if (strlen($patient->description) <= 24)
                                {{ $patient->description }}
                            @else
                                {{ substr($patient->description, 0, 24) }}
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center pt-8 font-medium text-xl">
                            Aucun rendez-vous
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">{{ $patients->links() }} </div>

    </div>

@endsection
