@extends('layouts.default')

@section('title', 'Editar Turmas')

@section('conteudo')
<div class="container">
    <h1>Editar Turmas</h1>

    <form class="row g-4" method="POST" action="{{ route('turmas.update', $turmas->idTurma) }}">
        @csrf
        @method('PUT')
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomeTurma">Nome da Turma:</label>
                    <input type="text" class="form-control" id="nomeTurma" name="nomeTurma"
                    value="{{ ($turmas->nomeTurma) }} " required>
                </div>
                <div class="form-group">
                    <label for="turnoTurma">Turno:</label>
                    <select class="form-select" id="turnoTurma" name="turnoTurma">
                        <option value="" selected="selected">Selecione</option>
                        <option value="Matutino" {{ $turmas->turnoTurma === 'Matutino' ? 'selected' : '' }}>Matutino</option>
                        <option value="Vespertino" {{ $turmas->turnoTurma === 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="anoLetivoTurma">Ano Letivo:</label>
                    <input type="text" class="form-control" id="anoLetivoTurma" name="anoLetivoTurma"
                    value="{{ ($turmas->anoLetivoTurma) }} " required>
                </div>
                <div class="form-group">
                    <label for="salaTurma">Sala:</label>
                    <input type="text" class="form-control" id="salaTurma" name="salaTurma"
                    value="{{ ($turmas->salaTurma) }} " required>
                </div>
            </div>

        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
            <a href="{{ route('turmas.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
