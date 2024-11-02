<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
       
        // Obtiene los usuarios con rango 'admin'
        $admins = User::where('rango', 'admin')->get();

        // Retorna la vista y pasa la variable $admins
        return view('admins', compact('admins'));
    }
}

