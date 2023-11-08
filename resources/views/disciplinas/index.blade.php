@extends('layouts.default')

@section('title', 'Disciplinas')

@section('conteudo')
    <div class="container">
        <h1>Disciplinas</h1>
        <p>Total de Disciplinas: {{ $totalDisciplinas }}</p>
        <div class="container ">
            <form action="{{ route('disciplinas.index') }}" method="get" class="mb-3 d-flex justify-content-end">
                <div class="input-group me-3">
                    <select name="filtro" class="form-select form-select-lg col-3">
                        <option value="nomeDisciplina">Nome</option>
                    </select>
                    <input type="text" name="busca" class="form-control form-control-lg" placeholder="Pesquisar...">
                    <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
                </div>
                <div class="btn-group" role="group" aria-label="Disciplinas actions">
                    <a href="{{ route('disciplinas.index') }}" class="btn btn-light border btn-lg me-2 rounded">Limpar</a>
                    <a href="{{ route('disciplinas.create') }}" class="btn btn-primary rounded-circle fs-4"><i
                            class="bi bi-plus-lg"></i></a>
                </div>
            </form>

        </div>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th width="60">ID</th>
                    <th>Código</th>
                    <th>Nome da Disciplina</th>
                    <th>Carga Horária</th>
                    <th width="160">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($disciplinas as $disciplina)
                    <tr>
                        <td class="align-middle text-center">{{ $disciplina->idDisciplina }}</td>
                        <td class="align-middle text-center">{{ $disciplina->codigoDisciplina }}</td>
                        <td class="align-middle text-center">{{ $disciplina->nomeDisciplina }}</td>
                        <td class="align-middle text-center">{{ $disciplina->cargaHorariaDisciplina }}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('disciplinas.edit', $disciplina->idDisciplina) }}" class="btn btn-primary"
                                title="Editar"><i class="bi bi-pen"></i></a>
                            <a href="" class="btn btn-danger" title="Excluir" data-bs-toggle="modal"
                                data-bs-target="#modal-deletar-{{ $disciplina->idDisciplina }}"><i
                                    class="bi bi-trash"></i></a>
                            @include('disciplinas.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Exibir os botões de navegação das páginas -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                @if ($disciplinas->previousPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $disciplinas->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span> Anterior
                        </a>
                    </li>
                @endif

                @if ($disciplinas->nextPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $disciplinas->nextPageUrl() }}" aria-label="Next">
                            Próximo <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
