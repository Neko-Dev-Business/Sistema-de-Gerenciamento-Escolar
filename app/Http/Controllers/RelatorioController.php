<?php
namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Turma;

class RelatorioController extends Controller
{
    public function gerarRelatorioTurmas(Request $request)
    {
        // Inicialize a query
        $query = Turma::query();

        // Verifique se o filtro foi aplicado
        if ($request->has('nome')) {
            $query->where('nomeTurma', 'like', '%' . $request->nome . '%');
        }
        if ($request->has('turma')) {
            $query->where('turnoTurma', $request->turma);
        }
        if ($request->has('ano')) {
            $query->where('anoLetivoTurma', $request->ano);
        }
        // Adicione mais condições de filtro conforme necessário

        // Execute a query com os filtros aplicados
        $turmas = $query->get();

        // Carregue a visualização do PDF com os dados filtrados
        $pdf = PDF::loadView('pdf.turmas', ['turmas' => $turmas]);

        // Faça o download do PDF
        return $pdf->download('relatorio_turmas.pdf');
    }
    public function gerarRelatorioDisciplinas(Request $request)
{
    // Inicialize a query
    $query = Disciplina::query();

    // Verifique se os parâmetros de filtro foram fornecidos
    if ($request->has('filterBy') && $request->has('filterValue')) {
        $filterBy = $request->input('filterBy');
        $filterValue = $request->input('filterValue');

        // Aplica o filtro à query
        // Certifique-se de que os campos especificados em 'filterBy' existem na tabela de disciplinas
        if (!empty($filterBy) && !empty($filterValue)) {
            // Adapte esta parte para corresponder aos nomes das colunas e lógica de negócio
            if ($filterBy == 'nome') {
                $query->where('nomeDisciplina', 'like', "%{$filterValue}%");
            }
            if ($filterBy == 'codigo') {
                $query->where('codigoDisciplina', 'like', "%{$filterValue}%");
            }
            if ($filterBy == 'cargaHoraria') {
                $query->where('cargaHorariaDisciplina', $filterValue);
            }
            // Adicione mais condições `elseif` conforme necessário
        }
    }

    // Execute a query com os filtros aplicados
    $disciplinas = $query->get();

    // Carregue a visualização do PDF com os dados filtrados
    $pdf = PDF::loadView('pdf.disciplinas', ['disciplinas' => $disciplinas]);

    // Faça o download do PDF
    return $pdf->download('relatorio_disciplinas.pdf');
}


}
