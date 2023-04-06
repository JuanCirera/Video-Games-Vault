<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    private array $videogames=[];//TODO: llamar a la API


    public function index() {
        //TODO: meter los videojuegos y el usuario si ha iniciado sesion
        return view("welcome");
    }
}
