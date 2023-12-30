@extends('base')
@section('title', 'administration')
@section('content')

    <div class="flex flex-col max-w-7xl mx-auto mt-2 overflow-x-auto">
        <form action="" method="GET" class="flex items-center gap-2 mb-2">
            @csrf
            <input type="text" class="border border-solid p-2 rounded " name="firstname" placeholder="prénom"
                value="{{ $inputs['firstname'] ?? '' }}">
            <input type="text" class="border border-solid p-2 rounded " name="cin" placeholder="cin"
                value="{{ $inputs['cin'] ?? '' }}">
            <input type="text" class="border border-solid p-2 rounded " name="phone" placeholder="phone"
                value="{{ $inputs['phone'] ?? '' }}">
            <input type="text" class="border border-solid p-2 rounded " name="specialite" placeholder="specialite"
                value="{{ $inputs['specialte'] ?? '' }}">
            <button class="btn bg-black">Rechercher</button>
        </form>
        @include('shared.flash')
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-medium">Tous les médecins </h1>
            <a href="{{ route('admin.create') }}"
                class="btn bg-black hover:transform hover:bg-gray-700 flex items-center gap-2 ">
                <span class="text-2xl font-medium">+</span>
                <span>
                    Nouveau médecin
                </span>
            </a>
        </div>
        <table class="min-w-full divide-y divide-gray-200 mt-4">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cin</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Spécialité
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($doctors as $doctor)
                    <tr class="hover:bg-papayawhip">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->firstname }} </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->lastname }} </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->cin }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->specialite }}</td>
                        <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center">
                            <a href="{{ route('admin.edit', ['doctor' => $doctor]) }}"
                                class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Modifier</a>
                            <form action="{{ route('admin.destroy', ['doctor' => $doctor]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center mt-4">
                            Aucun médecin
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">{{ $doctors->links() }} </div>
    </div>

@endsection
