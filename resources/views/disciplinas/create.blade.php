@extends('layouts.default')

@section('title', 'Disciplinas')

@section('conteudo')
<div class="container">
    <h1>Cadastro de Disciplinas</h1>

    <!-- Botão para adicionar Turma -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTurma">Adicionar Turma</button>

    <!-- Botão para adicionar Disciplina -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDisciplina">Adicionar Disciplina</button>

    <!-- Lista de Turmas -->
    <h2>Turmas</h2>
    <ul class="list-group">
        @foreach($turmas as $turma)
            <li class="list-group-item">{{ $turma->nomeTurma }}</li>
        @endforeach
    </ul>

    <!-- Lista de Disciplinas -->
    <h2>Disciplinas</h2>
    <ul class="list-group">
        @foreach($disciplinas as $disciplina)
            <li class="list-group-item">{{ $disciplina->nomeDisciplina }}</li>
        @endforeach
    </ul>
</div>

@include('turma.modal') <!-- Modal de Disciplinas -->
@include('disciplina.modal') <!-- Modal de Disciplina -->

@endsection
