<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <h3 class="text-lg font-semibold mb-4">Lista de clientes</h3>

                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Nombre</th>
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Email</th>
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Rango</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border-b border-gray-200">{{ $client->name }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $client->email }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $client->rango }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>