<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Obtiene todos los usuarios con rango "admin"
        $admins = User::where('rango', 'admin')->get();

        // Retorna la vista "admin" y pasa los datos de los administradores
        return view('admins.admins', ['admins' => $admins]);
    }
}
