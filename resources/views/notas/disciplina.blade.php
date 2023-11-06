@extends('layouts.default')

@section('title', 'Editar Notas')

@section('conteudo')
    <h1 class="mb-5">Escolha a Disciplina que deseja Visualizar as Notas</h1>

    <form class="row g-4" method="POST" action="{{ route('notas.update', $pessoa->idPessoa) }}">
        @csrf
        @method('PUT')
        <table class="table table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Código</th>
                    <th>Nome da Disciplina</th>
                    <th>Unidade I</th>
                    <th>R</th>
                    <th>Unidade II</th>
                    <th>R</th>
                    <th>Unidade III</th>
                    <th>R</th>
                    <th>Unidade IV</th>
                    <th>R</th>
                    <th width="160">Ação</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($pessoas as $pessoa)
                <tr>
                    <td class="align-middle text-center">{{ $pessoa->codigoDisciplina }}</td>
                    <td class="align-middle text-center">{{ $pessoa->nomeDisciplina }}</td>
                    <td class="align-middle text-center">{{ $pessoa->primeiraNota }}</td>
                    <td class="align-middle text-center">{{ $pessoa->primeiraNota}}</td>
                    <td class="align-middle text-center">@if ($pessoa->primeiraRecuperacao === null)-@else{{ $pessoa->primeiraRecuperacao }}@endif</td>
                    <td class="align-middle text-center">{{ $pessoa->segundaNota}}</td>
                    <td class="align-middle text-center">@if ($pessoa->segundaRecuperacao === null)-@else{{ $pessoa->segundaRecuperacao }}@endif</td>
                    <td class="align-middle text-center">{{ $pessoa->terceiraNota}}</td>
                    <td class="align-middle text-center">@if ($pessoa->terceiraRecuperacao === null)-@else{{ $pessoa->terceiraRecuperacao }}@endif</td>
                    <td class="align-middle text-center">{{ $pessoa->quartaNota}}</td>
                    <td class="align-middle text-center">@if ($pessoa->quartaRecuperacao === null)-@else{{ $pessoa->quartaRecuperacao }}@endif</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('disciplinas.edit', $pessoa->idDisciplina) }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </form>
@endsection
