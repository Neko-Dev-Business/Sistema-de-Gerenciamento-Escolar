<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Turma;
use App\Models\Disciplina;
use App\Models\Pessoa;
use App\Models\Escola;
use App\Models\Aluno_Turma;
class RelatorioController extends Controller
{
    public function gerarRelatorioTurmas(Request $request)
    {
        $query = Turma::query();

        $filterBy = $request->input('filterBy');
        $filterValue = $request->input('filterValue');

        if (!empty($filterBy) && !empty($filterValue)) {
            $query->where($filterBy, 'like', "%{$filterValue}%");
        }

        $turmas = $query->get();

        $pdf = PDF::loadView('pdf.turmas', compact('turmas'));

        return $pdf->download('relatorio_turmas.pdf');
    }

    public function gerarRelatorioDisciplinas(Request $request)
    {
        $query = Disciplina::query();

        $filterBy = $request->input('filterBy');
        $filterValue = $request->input('filterValue');

        if (!empty($filterBy) && !empty($filterValue)) {
            $query->where($filterBy, 'like', "%{$filterValue}%");
        }

        $disciplinas = $query->get();

        $pdf = PDF::loadView('pdf.disciplinas', compact('disciplinas'));

        return $pdf->download('relatorio_disciplinas.pdf');
    }

    public function gerarRelatorioAlunos(Request $request)
{
    $filtro = $request->input('filterBy'); // Nome do campo para filtrar
    $valorFiltro = $request->input('filterValue'); // Valor para buscar

    $query = Pessoa::where('tipoUsuario', '1');

    if (!empty($filtro) && !empty($valorFiltro)) {
        $query->where($filtro, 'like', "%{$valorFiltro}%");
    }

    $alunos = $query->get();

    $pdf = PDF::loadView('pdf.alunos', compact('alunos'))->setPaper('a4', 'landscape');
    return $pdf->download('relatorio_alunos.pdf');
}


    public function gerarBoletimAluno(Request $request)
    {

        // Validação dos parâmetros
        $request->validate([
            'nomeAluno' => 'required|string',
            'anoLetivo' => 'required|integer'
        ]);

        $nomeAluno = $request->query('nomeAluno');
        $anoLetivo = $request->query('anoLetivo');

        // Consulta ao banco de dados usando Query Builder
        $boletins = DB::table('notas')
            ->join('pessoas', 'notas.idPessoa', '=', 'pessoas.idPessoa')
            ->join('disciplinas', 'notas.idDisciplina', '=', 'disciplinas.idDisciplina')
            ->join('turmas', 'notas.idTurma', '=', 'turmas.idTurma')
            ->select(
                'disciplinas.nomeDisciplina',
                DB::raw("
                    GREATEST(IFNULL(primeiraNota, 0), IFNULL(primeiraRecuperacao, 0)) as FinalNota1,
                    GREATEST(IFNULL(segundaNota, 0), IFNULL(segundaRecuperacao, 0)) as FinalNota2,
                    GREATEST(IFNULL(terceiraNota, 0), IFNULL(terceiraRecuperacao, 0)) as FinalNota3,
                    GREATEST(IFNULL(quartaNota, 0), IFNULL(quartaRecuperacao, 0)) as FinalNota4
                ")
            )
            ->where('pessoas.tipoUsuario', 1)
            ->where('pessoas.nomePessoa', 'like', '%' . $nomeAluno . '%')
            ->where('turmas.anoLetivoTurma', $anoLetivo)
            ->groupBy('disciplinas.nomeDisciplina')
            ->get();

        // Verifica se a consulta retornou resultados
        if ($boletins->isEmpty()) {
            // Retornar alguma resposta de erro ou redirecionar
            return back()->withErrors(['mensagem' => 'Não foram encontrados boletins para os critérios informados.']);
        }

        // Cálculo da média e do resultado final
        foreach ($boletins as &$boletim) {
            $somaNotas = $boletim->FinalNota1 + $boletim->FinalNota2 + $boletim->FinalNota3 + $boletim->FinalNota4;
            $boletim->MediaFinal = $somaNotas / 4;
            $boletim->ResultadoFinal = $somaNotas < 24 ? 'Reprovado' : 'Aprovado';
        }

        // Carrega a view com os boletins, passando os dados para ela.
        return view('pdf.boletim', compact('boletins'));
    }

    public function gerarComprovanteMatricula(Request $request)
    {
        // Obtenha os valores do filtro do formulário
        $nomeAluno = $request->input('filterValue');

        // Valide os campos obrigatórios
        $request->validate([
            'filterBy' => 'required',
            'filterValue' => 'required',
        ]);

        $aluno = Pessoa::where('nomePessoa', 'like', '%' . $nomeAluno . '%')
        ->where('tipoPessoa', 1)
        ->first();

        if (!$aluno) {
            return back()->with('error', 'Aluno não encontrado.');
        }

        // Carregue os dados necessários para o comprovante de matrícula
        $escola = Escola::first(); // Você precisa ter um registro de escola no banco de dados
        $turmaDoAluno = Aluno_Turma::where('idPessoa', $aluno->idPessoa)->first();

        // Verifique se a turma do aluno foi encontrada
        if (!$turmaDoAluno) {
            return back()->with('error', 'Turma do aluno não encontrada.');
        }

        // Montar os dados para o comprovante de matrícula
        $data = [
            'diretoraEscola' => $escola->diretoraEscola,
            'nomeEscola' => $escola->nomeEscola,
            'nomePessoa' => $aluno->nomePessoa,
            'cpfPessoa' => $aluno->cpfPessoa,
            'dataNascimentoAluno' => $aluno->dataNascimentoPessoa,
            'nomeMae' => $aluno->nomeMaePessoa,
            'enderecoEscola' => $escola->enderecoEscola,
            'telefoneEscola' => $escola->telefoneEscola,
            'emailEscola' => $escola->emailEscola,
            'anoLetivo' => date('Y'),
            'dataEmissao' => date('d/m/Y'),
        ];

        $pdf = PDF::loadView('pdf_comprovante', $data);

    }

}




