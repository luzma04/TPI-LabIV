<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar un libro nuevo') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                    
                    <form method="POST" action="{{route('store')}}" class="space-y-6 max-w-lg mx-auto bg-white p-6 shadow-md rounded-md">
                    {{ __("Datos del libro") }}
                        @csrf
                        @method('post')
                        <!-- Título -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                            <input type="text" required name="title" value="{{ old('title', 'Harry Potter') }}" placeholder="Ej: Harry Potter" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <!-- Autor -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
                            <input type="text" required name="author" value="{{ old('author', 'J.K. Rowling') }}" placeholder="Ej: J.K Rowling" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select id="category" name="category" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="novela">Novela</option>
                                <option value="cuento">Cuento</option>
                                <option value="academico">Académico</option>
                            </select>
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea id="description" required name="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                {{ old('description', 'Descripción del libro...') }}
                            </textarea>
                        </div>

                        <!-- ISBN -->
                        <div>
                            <label for="ISBN_code" class="block text-sm font-medium text-gray-700">ISBN</label>
                            <input type="text" name="ISBN_code" required value="{{ old('ISBN_code', '1234567890') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <!-- Año de Publicación -->
                        <div>
                            <label for="publication_year" class="block text-sm font-medium text-gray-700">Año de publicación</label>
                            <input type="date" name="publication_year" required value="{{ old('publication_year', '2000-01-01') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <!-- Idioma -->
                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700">Idioma</label>
                            <select id="language" name="language" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="spanish">Español</option>
                                <option value="english">Inglés</option>
                                <option value="german">Alemán</option>
                            </select>
                        </div>

                        <!-- Cantidad -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad disponible</label>
                            <input type="number" name="quantity" required value="{{ old('quantity', 10) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <!-- Botón Enviar -->
                        <div class="pt-4">
                            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Guardar
                            </button>
                        </div>
                    </form>

        </div>
    </div>
</x-app-layout>
