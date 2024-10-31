<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Todos los libros') }}
            </h2>
            <a href="/books/create" class="ml-4 px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
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
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Título</th>
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Autor</th>
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Categoría</th>
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Idioma</th>
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Estado</th>
                            <th class="px-4 py-2 text-left font-semibold border-b border-gray-200">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border-b border-gray-200">{{ $book->title }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $book->author }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $book->category }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $book->language }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $book->state }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">
                                    <a href="{{route('books.details',['book'=>$book])}} "class="text-green-600 hover:text-blue-800">Ver</a>
                                    <a href="{{route('books.edit',['book'=>$book])}} "class="text-blue-600 hover:text-blue-800">Modificar</a>
                                    <form action="{{route('books.delete',['book'=>$book])}}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 ml-2">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
