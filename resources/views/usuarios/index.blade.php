@extends('layouts.default')

@section('title', 'Usuários')

@section('conteudo')

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <h1 class="mb-4">Usuários</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary position-absolute top-0 end-0 m-4
    rounded-circle fs-4" title="Cadastrar Usuário do Sistema"><i class="bi bi-plus-lg"></i></a>
    <p>Total de Usuários: {{ $totalUsuarios}}</p>
    <form action="{{ route('usuarios.index') }}" method="get" class="mb-3 d-flex justify-content-end">
        <div class="input-group me-3">
            <select name="filtroTipo" class="form-select form-select-lg col-3">
                <option value="">Tipo de Usuário</option>
                <option value="1">Aluno</option>
                <option value="2">Professor</option>
                <option value="3">Responsável</option>
            </select>
            <input type="text" name="busca" class="form-control form-control-lg" placeholder="Pesquisar...">
            <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
        </div>
        <div class="btn-group" role="group" aria-label="User actions">
            <a href="{{ route('usuarios.index') }}" class="btn btn-light border btn-lg me-2 rounded">Limpar</a>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary rounded-circle fs-4"><i class="bi bi-plus-lg"></i></a>
        </div>
    </form>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Tipo</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td class="align-middle text-center">{{ $usuario->id }}</td>
                <td class="align-middle text-center">{{ $usuario->name }}</td>
                <td class="align-middle text-center">{{ $usuario->email }}</td>
                <td class="align-middle text-center">{{ $usuario->tipo }}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    <a href="" class="btn btn-danger" title="Excluir" data-bs-toggle="modal" data-bs-target="#modal-deletar-{{ $usuario->id }}"><i class="bi bi-trash"></i></a>

                    @include('usuarios.delete')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $cargos->links('paginacao') }} --}}
@endsection

