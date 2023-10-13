<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userDashboard = DB::table('users')
        ->get();

        $totalProfessores = 1721.67;

        $totalAlunos = 1721.67;

        return view('dashboard.index', compact('totalProfessores', 'totalAlunos', 'userDashboard'));
    }

    public function cadastro()
    {
        return view('cadastro.index'); // Supondo que o nome da view do cadastro seja 'cadastro.index'
    }
}
