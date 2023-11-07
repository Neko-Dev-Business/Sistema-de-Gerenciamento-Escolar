@extends('layouts.default')

@section('title', 'Turmas')

@section('conteudo')
<div class="container">
        <h1>Turmas</h1>
        <p>Total de Turmas: {{ $totalTurmas }}</p>
        <div class="container ">
            <form action="{{ route('turmas.index') }}" method="get" class="mb-3 d-flex justify-content-end">
                <div class="input-group me-3">
                    <select name="filtro" class="form-select form-select-lg col-3">
                        <option value="anoLetivoTurma">Ano</option>
                        <option value="nomeTurma">Nome</option>
                        <option value="turnoTurma">Turno</option>
                        <option value="salaTurma">Sala</option>
                    </select>
                    <input type="text" name="busca" class="form-control form-control-lg" placeholder="Pesquisar...">
                    <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
                </div>
                <div class="btn-group" role="group" aria-label="Turma actions">
                    <a href="{{ route('turmas.index') }}" class="btn btn-light border btn-lg me-2 rounded">Limpar</a>
                    <a href="{{ route('turmas.create') }}" class="btn btn-primary rounded-circle fs-4"><i class="bi bi-plus-lg"></i></a>
                </div>
            </form>

        </div>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Nome</th>
                <th>Turno</th>
                <th>Ano Letivo</th>
                <th>Sala</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($turmas as $turma)
                <tr>
                    <td class="align-middle text-center">{{ $turma->idTurma }}</td>
                    <td class="align-middle text-center">{{ $turma->nomeTurma }}</td>
                    <td class="align-middle text-center">{{ $turma->turnoTurma }}</td>
                    <td class="align-middle text-center">{{ $turma->anoLetivoTurma }}</td>
                    <td class="align-middle text-center">{{ $turma->salaTurma }}</td>
                    <td class="align-middle text-center">                               
                        <a href="{{ route('turmas.edit', $turma->idTurma) }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                        <a href="" class="btn btn-danger" title="Excluir" data-bs-toggle="modal" data-bs-target="#modal-deletar-{{ $turma->idTurma }}"><i class="bi bi-trash"></i></a>
                        @include('turmas.delete')
                        <!-- Botão para exibir disciplinas -->
                        <a href="" class="btn btn-success" title="Adicionar" data-bs-toggle="modal" data-bs-target="#modalTurmaDisciplinas_{{ $turma->idTurma }}"><i class="bi bi-plus"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Exibir os botões de navegação das páginas -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            @if($turmas->previousPageUrl())
                <li class="page-item">
                    <a class="page-link" href="{{ $turmas->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span> Anterior
                    </a>
                </li>
            @endif
    
            @if($turmas->nextPageUrl())
                <li class="page-item">
                    <a class="page-link" href="{{ $turmas->nextPageUrl() }}" aria-label="Next">
                        Próximo <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>

@foreach ($turmas as $turma)
    @include('turmas.turmas_disciplinas.disciplina_modal', ['turma' => $turma])
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('.open-discipline-modal').on('click', function() {
            // Esconda todos os modais
            $('.modal').modal('hide');

            var turmaId = $(this).data('turma');
            $('#modalTurmaDisciplinas_' + turmaId).modal('show');
        });
    });
</script>

@endsection

