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
                                        <a href="{{ route('aluno_turma.create') }}" class="btn btn-success">
                                            <i class="bi bi-arrow-right-square"></i> Associar a Turma
                                        </a>
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
