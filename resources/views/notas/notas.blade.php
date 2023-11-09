@extends('layouts.default')

@section('title', 'Notas por Turma e Aluno')

@section('conteudo')
    <div class="container">
        <h1>Notas de {{ $pessoa->nomePessoa }} na turma {{ $turma->nomeTurma }}</h1>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">Disciplina</th>
                    <th class="text-center">Unidade I</th>
                    <th class="text-center">Recuperação</th>
                    <th class="text-center">Unidade II</th>
                    <th class="text-center">Recuperação</th>
                    <th class="text-center">Unidade III</th>
                    <th class="text-center">Recuperação</th>
                    <th class="text-center">Unidade IV</th>
                    <th class="text-center">Recuperação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pessoa->notas as $nota)
                    <tr>
                        <td class="text-center">
                            @if ($nota->disciplina)
                                {{ $nota->disciplina->nomeDisciplina }}
                            @else
                                Disciplina não encontrada
                            @endif
                        </td>
                        <td class="text-center">{{ $nota->primeiraNota ?? '-' }}</td>
                        <td class="text-center">{{ $nota->primeiraRecuperacao ?? '-' }}</td>
                        <td class="text-center">{{ $nota->segundaNota ?? '-' }}</td>
                        <td class="text-center">{{ $nota->segundaRecuperacao ?? '-' }}</td>
                        <td class="text-center">{{ $nota->terceiraNota ?? '-' }}</td>
                        <td class="text-center">{{ $nota->terceiraRecuperacao ?? '-' }}</td>
                        <td class="text-center">{{ $nota->quartaNota ?? '-' }}</td>
                        <td class="text-center">{{ $nota->quartaRecuperacao ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
