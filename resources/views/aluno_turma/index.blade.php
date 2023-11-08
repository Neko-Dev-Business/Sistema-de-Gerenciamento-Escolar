@extends('layouts.default')

@section('title', 'Associar Aluno')

@section('conteudo')
<div class="container">
        <h2 class="mb-3">Associar Alunos</h2>
        <form action="{{ route('aluno_turma.index') }}" method="get" class="mb-3 d-flex justify-content-end">
            <div class="input-group me-3">
                <select name="filtro" class="form-select form-select-lg col-3">
                    <option value="nomePessoa">Nome</option>
                </select>
                <input type="text" name="busca" class="form-control form-control-lg" placeholder="Pesquisar...">
                <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
            </div>
            <div class="btn-group" role="group" aria-label="Alunos Turma actions">
                <a href="{{ route('aluno_turma.index') }}" class="btn btn-light border btn-lg me-2 rounded">Limpar</a>
            </div>
        </form>
        @if ($alunos->isEmpty())
            <div class="alert alert-warning" role="alert">
                Não há alunos cadastrados.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover text-center">
                   <thead class="table-dark text-center">
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
                                    <td class="text-center">
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
                                                            <table class="table table-striped">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <th>Nome da Turma</th>
                                                                        <th>Ano Letivo</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($alunoTurma as $aluno)
                                                                        <tr>
                                                                            <td>{{ $aluno->turma->nomeTurma }}</td>
                                                                            <td>{{ $aluno->turma->anoLetivoTurma }}</td>

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
