<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar un libro nuevo') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                    <form id="formBook" method="POST" action="{{route('books.store')}}" class="space-y-6 max-w-lg mx-auto bg-white p-6 shadow-md rounded-md">
                        @if ($errors->any())
                            <div class="text-red-600">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{ __("Datos del libro") }}
                        @csrf
                        @method('post')
                        <!-- Título -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                            <input type="text" required name="title" value="{{ old('title', $title) }}" placeholder="Ej: Harry Potter" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <!-- Autor -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
                            <input type="text" required name="author" value="{{ old('author', $author) }}" placeholder="Ej: J.K Rowling" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select id="category" name="category" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="novela" {{ old('category', $category) == 'novela' ? 'selected' : '' }}>Novela</option>
                                <option value="cuento" {{ old('category', $category) == 'cuento' ? 'selected' : '' }}>Cuento</option>
                                <option value="academico" {{ old('category', $category) == 'academico' ? 'selected' : '' }}>Académico</option>
                            </select>
                        </div>
                        

                        <!-- Descripción -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea id="description" value="Alguna descripcion" required name="description" rows="4" class="mt-1 block w-full pt-1 py-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                {{ old('description', $description) }}
                            </textarea>
                        </div>

                        <!-- ISBN -->
                        <div>
                            <label for="ISBN_code" class="block text-sm font-medium text-gray-700">ISBN</label>
                            <input 
                                type="text" 
                                name="ISBN_code" 
                                required 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                maxlength="13" 
                                pattern="\d{13}" 
                                value="{{ old('ISBN_code', $isbn) }}" 
                                title="Debe ingresar exactamente 13 dígitos numéricos"/>
                        </div>

                        <!-- Año de Publicación -->
                        <div>
                            <label for="publication_year" class="block text-sm font-medium text-gray-700">Año de publicación</label>
                            <input type="date" value="{{old('publication_year', $publication_year)}}" name="publication_year" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>

                        <!-- Idioma -->
                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700">Idioma</label>
                            <select id="language" name="language" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="espanol" {{ old('language', $language) == 'espanol' ? 'selected' : '' }}>Español</option>
                                <option value="ingles" {{ old('language', $language) == 'ingles' ? 'selected' : '' }}>Inglés</option>
                                <option value="aleman" {{ old('language', $language) == 'aleman' ? 'selected' : '' }}>Alemán</option>
                            </select>
                        </div>

                        {{-- Falta que valide si es mayor o igual a 1 --}}
                        <!-- Cantidad -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad disponible</label>
                            <input type="number" title="El minimo es 1" minlength="1" value={{old('quantity', $quantity)}} name="quantity" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"/>
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
    {{-- <script>
        document.getElementById('formBook').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita que se envíe el formulario
            const formData = new FormData(this); // Obtiene los datos del formulario
            const formEntries = Object.fromEntries(formData.entries()); // Convierte a objeto

            console.log("Datos del formulario:", formEntries);
        });
    </script> --}}
</x-app-layout>
