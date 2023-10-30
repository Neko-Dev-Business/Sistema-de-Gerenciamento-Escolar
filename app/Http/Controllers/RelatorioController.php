<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Turma;

class RelatorioController extends Controller
{
    public function gerarRelatorioTurmas()
    {
        // Obtenha os dados das turmas (substitua esta parte com seus próprios dados)
        $turmas = Turma::all();

        // Carregue a visualização do PDF (substitua 'pdf.turmas' pelo nome da sua visualização)
        $pdf = PDF::loadView('pdf.turmas', ['turmas' => $turmas]);

        // Faça o download do PDF
        return $pdf->download('relatorio_turmas.pdf');
    }
}
