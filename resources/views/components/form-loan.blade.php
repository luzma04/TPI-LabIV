<form action="{{ $action }}" method="{{ $method }}" class="space-y-6 max-w-lg mx-auto bg-white p-6 shadow-md rounded-md ">
    @csrf

    <!-- Cliente -->
    <div>
        <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
        <select id="cliente" name="cliente" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <option value="juan_perez">Juan perez</option>
        </select>
    </div>

     <!-- libro -->
     <div>
        <label for="libro" class="block text-sm font-medium text-gray-700">libro</label>
        <select id="libro" name="libro" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <option value="el_principito">el principito</option>
        </select>
    </div>

    <div>
        <label for="duracion" class="block text-sm font-medium text-gray-700">Cantidad de dias:</label>
        <input type="number" value="7" name="duracion" id="duracion" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required />
    </div>

    <div>
        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Guardar
        </button>
    </div>
</form>
