@extends('layouts.default')

@section('title', 'Editar Aluno')

@section('conteudo')
    <h1 class="mb-5">Editar Aluno</h1>

    <form class="row g-4" method="POST" action="{{ route('alunos.update', $alunos->idAluno) }}">
        @csrf
        @method('PUT')
        <div class="col-md-4">
            <label for="dtMatriculaAluno" class="form-label fs-5">Data de Matricula</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtMatriculaAluno" name="dtMatriculaAluno" required>
        </div>
        <div class="col-md-4">
            <label for="dtDesligamentoAluno" class="form-label fs-5">Data de Desligamento</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtDesligamentoAssociado" name="dtDesligamentoContratado">
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('alunos.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
