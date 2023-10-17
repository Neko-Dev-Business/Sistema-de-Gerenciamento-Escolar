@extends('layouts.default')

@section('title', 'Cadastrar Aluno')

@section('conteudo')
    <h1 class="mb-5">Cadastrar Alunos</h1>

    <form class="row g-4" method="POST" action="{{ route('alunos.store') }}">
        @csrf
        <select class="form-select form-select-lg bg-white" id="idPessoa" name="idPessoa" required>
            @foreach ($pessoas as $pessoa)
                <option value="{{ $pessoa->idPessoa }}">{{ $pessoa->nomePessoa}}</option>
            @endforeach
        </select>
        <div class="col-md-4">
            <label for="dtMatriculaAluno" class="form-label fs-5">Data de Matrícula</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtMatriculaAluno" name="dtMatriculaAluno" required>
        </div>
        <div class="col-md-4">
            <label for="dtDesligamentoAluno" class="form-label fs-5">Data de Desligamento</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtDesligamentoAluno" name="dtDesligamentoAluno">
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('alunos.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
