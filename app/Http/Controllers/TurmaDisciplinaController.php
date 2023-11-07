<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Disciplina;
use App\Models\Turma_Disciplina;
use Illuminate\Support\Facades\DB;

class TurmaDisciplinaController extends Controller
{
    public function index(Request $request)
    {
        try {
            $turmasDisciplinas = DB::table('turmas_disciplinas')
                ->join('turmas', 'turmas.idTurma', '=', 'turmas_disciplinas.idTurma', 'inner')
                ->join('disciplinas', 'disciplinas.idDisciplina', '=', 'turmas_disciplinas.idDisciplina', 'inner')
                ->where('nomeTurma', 'like', '%' . $request->buscaPessoa . '%')
                ->orderBy('nomeTurma', 'asc')
                ->simplePaginate(10);

            if ($turmasDisciplinas) {
                return view('turmas.turmas_disciplinas.disciplina_modal', compact('turmasDisciplinas'));
            } else {
                // Lidar com casos em que nenhum dado é encontrado
                return view('turmas.turmas_disciplinas.disciplina_modal')->with('error', 'Nenhum dado encontrado');
            }
        } catch (\Exception $e) {
            // Registrar o erro para depuração
            // Log::error($e->getMessage());

            return view('turmas.turmas_disciplinas.disciplina_modal')->with('error', $e->getMessage());
        }
    }
}

