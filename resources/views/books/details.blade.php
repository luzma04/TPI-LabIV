<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del libro') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                    
        <form method="POST" action="{{route('details',['book'=>$book])}}" class="space-y-6 max-w-lg mx-auto bg-white p-6 shadow-md rounded-md">
            {{ __("Datos del libro") }}
            @csrf
            @method('put')

            <!-- Título -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text"  readonly name="title" value="{{ old('title', $book->title) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Autor -->
            <div>
                <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
                <input type="text" readonly name="author" value="{{ old('author', $book->author) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Categoría -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>

                <input type="text" readonly name="category" value="{{ old('category', $book->category) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />

            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="description" readonly name="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $book->description) }}</textarea>
            </div>

            <!-- Estado -->
            <div>
                <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                <input type="text" readonly name="state" value="{{ old('state', $book->state) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div> 

            <!-- ISBN -->
            <div>
                <label for="ISBN_code" class="block text-sm font-medium text-gray-700">ISBN</label>
                <input type="text" readonly name="ISBN_code" value="{{ old('ISBN_code', $book->ISBN_code) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Año de Publicación -->
            <div>
                <label for="publication_year" class="block text-sm font-medium text-gray-700">Año de publicación</label>
                <input type="date" readonly name="publication_year" value="{{ old('publication_year', $book->publication_year) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Idioma -->
            <div>
                <label for="language" class="block text-sm font-medium text-gray-700">Idioma</label>

                <input type="text" readonly name="language" value="{{ old('language', $book->language) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />

            </div>

            <!-- Cantidad -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad disponible</label>
                <input type="number" readonly name="quantity" value="{{ old('quantity', $book->quantity) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            
        </form>

        </div>
    </div>
</x-app-layout>
