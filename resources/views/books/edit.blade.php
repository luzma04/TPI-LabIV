<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar libro') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                    
        <form method="POST" action="{{route('update',['book'=>$book])}}" class="space-y-6 max-w-lg mx-auto bg-white p-6 shadow-md rounded-md">
            {{ __("Datos del libro") }}
            @csrf
            @method('put')

            <!-- Título -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" value="{{ old('title', $book->title) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Autor -->
            <div>
                <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
                <input type="text" name="author" value="{{ old('author', $book->author) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Categoría -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="category" name="category" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="novela" {{ old('category', $book->category) == 'novela' ? 'selected' : '' }}>Novela</option>
                    <option value="cuento" {{ old('category', $book->category) == 'cuento' ? 'selected' : '' }}>Cuento</option>
                    <option value="academico" {{ old('category', $book->category) == 'academico' ? 'selected' : '' }}>Académico</option>
                </select>
            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $book->description) }}</textarea>
            </div>

            <!-- ISBN -->
            <div>
                <label for="ISBN_code" class="block text-sm font-medium text-gray-700">ISBN</label>
                <input type="text" name="ISBN_code" value="{{ old('ISBN_code', $book->ISBN_code) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Año de Publicación -->
            <div>
                <label for="publication_year" class="block text-sm font-medium text-gray-700">Año de publicación</label>
                <input type="date" name="publication_year" value="{{ old('publication_year', $book->publication_year) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Idioma -->
            <div>
                <label for="language" class="block text-sm font-medium text-gray-700">Idioma</label>
                <select id="language" name="language" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="spanish" {{ old('language', $book->language) == 'spanish' ? 'selected' : '' }}>Español</option>
                    <option value="english" {{ old('language', $book->language) == 'english' ? 'selected' : '' }}>Inglés</option>
                    <option value="german" {{ old('language', $book->language) == 'german' ? 'selected' : '' }}>Alemán</option>
                </select>
            </div>

            <!-- Cantidad -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad disponible</label>
                <input type="number" name="quantity" value="{{ old('quantity', $book->quantity) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Botón Enviar -->
            <div class="pt-4">
                <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Actualizar
                </button>
            </div>
        </form>

        </div>
    </div>
</x-app-layout>
