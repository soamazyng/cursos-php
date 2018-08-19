<?php

namespace laravel_express\Http\Controllers;

use Illuminate\Http\Request;

use laravel_express\Http\Requests;
use laravel_express\Http\Controllers\Controller;

class TestController extends Controller
{
    
    public function index($nome = "")
    {
        return view('test.index', ['nome' => $nome]);
    }

    public function notas()
    {

        $todasNotas = [
            0 => 'Anotação 001',
            1 => 'Anotação 002',
            2 => 'Anotação 003',
            3 => 'Anotação 004',
            4 => 'Anotação 005',
        ];

        return view('test.notas', compact('todasNotas'));
    }

}
