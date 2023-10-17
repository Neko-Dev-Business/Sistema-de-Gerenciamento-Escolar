@extends('layouts.default')

@section('title', 'Alunos')

@section('conteudo')
    {{-- ERRO NA SESSION! --}}
    {{--  @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif--}}

    <h1 class="mb-4">Alunos</h1>
    <a href="{{ route('alunos.create') }}" class="btn btn-primary position-absolute top-0 end-0 m-4
    rounded-circle fs-4"><i class="bi bi-plus-lg"></i></a>
    <p>Total de Alunos: {{ $totalAlunos }}</p>

<form action="" method="get" class="mb-3 d-flex justify-content-end">
    <div class="input-group me-3">
        <input type="text" name="buscaAlunos" class="form-control form-control-lg" placeholder="Nome do Aluno">
        <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
    </div>
    <a href="{{ route('alunos.index') }}" class="btn btn-light border btn-lg">Limpar</a>
</form>
    <table class="table table-striped ">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Pessoa</th>
                <th>Telefone</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
                <td class="align-middle text-center">{{ $aluno->idAluno}}</td>
                <td class="align-middle text-center">{{ $aluno->nomePessoa}}</td>
                <td class="align-middle text-center">{{ $aluno->telefonePessoa}}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('alunos.edit', $aluno->idAluno) }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    <a href="" class="btn btn-danger" title="Excluir" data-bs-toggle="modal" data-bs-target="#modal-deletar-{{ $aluno->idAluno }}"><i class="bi bi-trash"></i></a>
                    
                    @include('alunos.delete')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $cargos->links('paginacao') }} --}}
@endsection