@extends('layouts.default')

@section('title', 'Editar Disciplina')

@section('conteudo')
<div class="container">
    <h1>Editar Disciplinas</h1>

    <form class="row g-4" method="POST" action="{{ route('disciplinas.update', $disciplina->idDisciplina) }}">
        @csrf
        @method('PUT')
        <div class="col-md-4">
            <label for="codigoDisciplina" class="form-label fs-5">Código Disciplina</label>
            <input type="text" class="form-control form-control-lg bg-light" id="codigoDisciplina" name="codigoDisciplina"
            value="{{ $disciplina->codigoDisciplina }}" required>
        </div>
        <div class="col-md-4">
            <label for="nomeDisciplina" class="form-label fs-5">Nome da Disciplina</label>
            <input type="text" class="form-control form-control-lg bg-light" id="nomeDisciplina" name="nomeDisciplina"
            value="{{ $disciplina->nomeDisciplina }}" required>
        </div>
        <div class="col-md-4">
            <label for="cargaHorariaDisciplina" class="form-label fs-5">Carga Horária (Horas)</label>
            <input type="number" class="form-control form-control-lg bg-light" id="cargaHorariaDisciplina" name="cargaHorariaDisciplina"
            value="{{ $disciplina->cargaHorariaDisciplina }}" required>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
            <a href="{{ route('disciplinas.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection