<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Obtiene todos los usuarios con rango "admin"
        $clients = User::where('rango', 'user')->get();

        // Retorna la vista "admin" y pasa los datos de los administradores
        return view('clients.clients', ['clients' => $clients]);
    }
}
