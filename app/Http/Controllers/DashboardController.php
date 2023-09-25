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

        $totalMes = 1721.67;
        
        $totalAno = 1721.67;

        return view('dashboard.index', compact('totalMes', 'totalAno', 'userDashboard'));
    }
}
