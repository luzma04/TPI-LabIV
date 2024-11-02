 <!--<x-app-layout>
    
    <h1>Administradores</h1>

</x-app-layout> -->
@extends('layouts.app')

@section('content')
    <h2>Administradores</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Creación</th>
                <!-- Agrega otros campos si es necesario -->
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection 
