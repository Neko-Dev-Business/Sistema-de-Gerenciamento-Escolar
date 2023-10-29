@extends('layouts.default')

@section('title', 'Ano Letivo')

@section('conteudo')
<div class="container">
    <h1>Cadastro de Turmas</h1>

    <a href="{{ route('turmas.create') }}" class="btn btn-primary position-absolute top-0 end-0 m-4
    rounded-circle fs-4"><i class="bi bi-person-plus-fill"></i></a>

    <p>Total de Pessoa: #</p>

<form action="" method="get" class="mb-3 d-flex justify-content-end">
    <div class="input-group me-3">
        <input type="text" name="buscaPessoa" class="form-control form-control-lg" placeholder="Pesquisar por Nome">
        <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
    </div>
    <a href="{{ route('turmas.index') }}" class="btn btn-light border btn-lg">Limpar</a>
</form>
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
                <td class="align-middle text-center">#</td>
                    <td class="align-middle text-center">
                        @include('disciplina_modal')
                        {{-- <a href="#" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#editarDisciplinaModal">
                            <i class="bi bi-pen" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
                        </a> --}}
                        <a href="" class="btn btn-danger" title="Excluir" data-bs-toggle="modal" data-bs-target="#modal-deletar-{{ $turma->idTurma }}"><i class="bi bi-trash"></i></a>
                        @include('turmas.delete')
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>

 <!--{ $pessoas->links() }}-->


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
