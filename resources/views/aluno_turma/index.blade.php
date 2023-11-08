@extends('layouts.default')

@section('title', 'Associar Aluno')

@section('conteudo')
    <div class="container mt-4">
        <h2 class="mb-3">Alunos Cadastrados</h2>

        @if ($alunos->isEmpty())
            <div class="alert alert-warning" role="alert">
                Não há alunos cadastrados.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                            @if ($aluno->tipoUsuario === '1')
                                <tr>
                                    <td>{{ $aluno->idPessoa }}</td>
                                    <td>{{ $aluno->nomePessoa }}</td>
                                    <td>
                                        <a href="{{ route('aluno_turma.create', ['id' => $aluno->idPessoa]) }}" class="btn btn-success">
                                            <i class="bi bi-arrow-right-square"></i> Associar a Turma
                                        </a>

                                        <button class="btn btn-primary" data-toggle="modal" data-target="#turmasModal_{{ $aluno->idPessoa }}">
                                            <i class="bi bi-search"></i> Turmas Vinculadas
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="turmasModal_{{ $aluno->idPessoa }}" tabindex="-1" role="dialog" aria-labelledby="turmasModalLabel_{{ $aluno->idPessoa }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="turmasModalLabel_{{ $aluno->idPessoa }}">Turmas Vinculadas a {{ $aluno->nomePessoa }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @php
                                                            $alunoTurma = \App\Models\Aluno_Turma::where('idPessoa', $aluno->idPessoa)->get();
                                                        @endphp
                                                        @if ($alunoTurma->isNotEmpty())
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nome da Turma</th>
                                                                        <th>Ano Letivo</th>
                                                                        <!-- Adicione mais colunas conforme necessário -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($alunoTurma as $aluno)
                                                                        <tr>
                                                                            <td>{{ $aluno->turma->nomeTurma }}</td>
                                                                            <td>{{ $aluno->turma->anoLetivoTurma }}</td>
                                                                            <!-- Preencha com mais dados se necessário -->
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            <p>Sem turmas vinculadas a este aluno.</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
