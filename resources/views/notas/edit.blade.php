@extends('layouts.default')

@section('title', 'Editar Notas')

@section('conteudo')
    <div class="container">
        <h1 class="mb-5">Editar Notas</h1>

        <form class="row g-4" method="POST" action="{{ route('notas.update', $pessoa->idPessoa) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="primeiraNota">Nota - Unidade I:</label>
                        <input type="text" class="form-control" id="primeiraNota" name="primeiraNota" required>
                    </div>
                    <div class="form-group">
                        <label for="segundaNota">Nota - Unidade II:</label>
                        <input type="text" class="form-control" id="segundaNota" name="segundaNota" required>
                    </div>
                    <div class="form-group">
                        <label for="primeiraNota">Nota - Unidade III:</label>
                        <input type="text" class="form-control" id="primeiraNota" name="primeiraNota" required>
                    </div>
                    <div class="form-group">
                        <label for="segundaNota">Nota - Unidade IV:</label>
                        <input type="text" class="form-control" id="segundaNota" name="segundaNota" required>
                    </div>
        </form>
    </div>
@endsection
