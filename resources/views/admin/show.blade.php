@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Administradores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($administradores as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
