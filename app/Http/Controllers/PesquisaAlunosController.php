<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesquisaAlunosController extends Controller
{
    public function index()
    {
        return view('pesquisa.index'); // Este nome deve corresponder ao arquivo da view criada
    }
}
