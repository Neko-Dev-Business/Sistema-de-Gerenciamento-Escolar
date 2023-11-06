@extends('layouts.default')

@section('title', 'Notas')

@section('conteudo')
    {{-- ERRO NA SESSION! --}}
    {{--  @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif--}}

    <h1 class="mb-4">Notas dos Alunos</h1>
    <p>Total de Alunos: {{ $totalAlunos }}</p>

<form action="" method="get" class="mb-3 d-flex justify-content-end">
    <div class="input-group me-3">
        <input type="text" name="buscaPessoa" class="form-control form-control-lg" placeholder="Pesquisar por Nome">
        <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
    </div>
    <div class="btn-group" role="group" aria-label="Alunos actions">
        <a href="{{ route('notas.index') }}" class="btn btn-light border btn-lg me-2 rounded">Limpar</a>
    </div>
</form>
    <table class="table table-striped ">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Pessoa</th>
                <th>CPF</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
            <tr>
                <td class="align-middle text-center">{{ $pessoa->idPessoa}}</td>
                <td class="align-middle text-center">{{ $pessoa->nomePessoa}}</td>
                <td class="align-middle text-center"><span class="cpf-mask">{{ $pessoa->cpfPessoa}}</span></td>
                <td class="align-middle text-center">
                    <a href="" class="btn btn-danger" title="Turma" data-bs-toggle="modal" data-bs-target="#modal-turma-{{ $pessoa->idPessoa }}"><i class="bi bi-trash"></i></a>
                        
                        @include('notas.turma')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $alunos->links('paginacao') }} --}}
@endsection
