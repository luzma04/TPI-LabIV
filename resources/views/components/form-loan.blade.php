<form method="POST" action="{{ $action }}" class="max-w-lg mx-auto bg-white p-6 shadow-md rounded-md space-y-6">
    @csrf
    @method($method ?? 'POST')
    
    <!-- Usuario -->
    <div>
        <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
        <select id="user_id" name="user_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>
    </div>
    
    <!-- Libro -->
    <div>
        <label for="book_id" class="block text-sm font-medium text-gray-700">Libro</label>
        <select id="book_id" name="book_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }} (ISBN: {{ $book->ISBN_code }})</option>
            @endforeach
        </select>
    </div>
    
    <!-- Fecha de inicio -->
    <div>
        <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
        <input type="date" id="start_date" name="start_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    
    <!-- Fecha de fin -->
    <div>
        <label for="end_date" class="block text-sm font-medium text-gray-700">Fecha de fin</label>
        <input type="date" id="end_date" name="end_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    
    <!-- Estado -->
    <div>
        <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
        <select id="state" name="state" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>

    <!-- Botón Enviar -->
    <div class="pt-4">
        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Guardar Préstamo
        </button>
    </div>
</form>
