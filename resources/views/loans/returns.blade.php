<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Todos las devoluciones') }}
            </h2>
            <a href="/loans/create" class="ml-4 px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Agregar
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Cliente</th>
                                <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Email</th>
                                <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Libro</th>
                                <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">ISBN</th>
                                <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Fecha límite</th>
                                <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Estado</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                                @if($loan->book && $loan->state=="inactivo")
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->user->name }}</td>
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->user->email }}</td>
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->book->title }}</td>
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->book->ISBN_code }}</td>
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->end_date }}</td>
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->state }}</td>
                                        
                                    </tr>
                                    {{-- @else
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->user->name }}</td>
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->user->email }}</td>
                                        <td class="px-4 py-2 border-b border-gray-200">Libro no encontrado (posible eliminación)</td>
                                        <td class="px-4 py-2 border-b border-gray-200"></td>
                                        <td class="px-4 py-2 border-b border-gray-200">{{ $loan->end_date }}</td>
                                        <td class="px-4 py-2 border-b border-gray-200">
                                            <a href="" class="text-red-600 hover:text-blue-800">Eliminar</a>
                                        </td>
                                    </tr> --}}
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
