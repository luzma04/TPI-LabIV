<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editacion del prestamo') }}
        </h2>
    </x-slot>
    <div class="py-12">
        
        <x-form-loan action="{{ route('store') }}" method="POST" />
    </div>

    
</x-app-layout>
