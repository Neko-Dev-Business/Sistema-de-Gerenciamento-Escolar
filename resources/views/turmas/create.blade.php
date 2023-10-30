@extends('layouts.default')

@section('title', 'Turmas')

@section('conteudo')
    <h1 class="mb-3">Cadastro de Turmas:</h1>
    <div class="alert alert-danger text-center p-2" style="display: none" id="div-alert-2"></div>
    <form class="row g-4" method="POST" action="{{ route('turmas.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row mt-3">
            <div class="col-md-12">
                <!-- Campos de Informações das Turmas -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomeTurma">Nome da Turma:</label>
                        <input type="text" class="form-control" id="nomeTurma" name="nomeTurma">
                    </div>
                    <div class="form-group">
                        <label for="turnoTurma">Turno:</label>
                        <select class="form-select" id="turnoTurma" name="turnoTurma">
                            <option value="" selected="selected">Selecione</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="anoLetivoTurma">Ano Letivo:</label>
                        <input type="text" class="form-control" id="anoLetivoTurma" name="anoLetivoTurma">
                    </div>
                    <div class="form-group">
                        <label for="salaTurma">Sala:</label>
                        <input type="text" class="form-control" id="salaTurma" name="salaTurma">
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary btn-lg m-3">Cadastrar</button>
        <a href="{{ route('turmas.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
    </div>
    </form>

@endsection

