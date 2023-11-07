@extends('layouts.default')

@section('conteudo')
<div class="container">
    <form action="{{ route('aluno_turma.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <h2>Associar Aluno a Turma</h2>
            <label for="anoLetivoTurma">Ano Letivo:</label>
            <select name="anoLetivoTurma" id="anoLetivoTurma" class="form-control" onchange="filterTurmas(this.value)">
                <option value="">Selecione o Ano Letivo</option>
                @foreach($anosLetivos as $ano)
                    <option value="{{ $ano }}">{{ $ano }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idTurma">Turma:</label>
            <select name="idTurma" id="idTurma" class="form-control">
                <option value="">Selecione uma Turma</option>
                <!-- As opções de turma serão filtradas com base no ano letivo usando JavaScript -->
                @foreach($turmas as $turma)
                    <option class="turma-{{ $turma->anoLetivoTurma }}" value="{{ $turma->idTurma }}">{{ $turma->nomeTurma }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Associar</button>
    </form>
</div>

<script>
    function filterTurmas(anoLetivo) {
        // Ocultar todas as opções de turma
        const options = document.querySelectorAll('#idTurma option');
        options.forEach(option => {
            option.style.display = 'none';
        });

        // Exibir apenas as opções de turma com o ano letivo correspondente
        const turmaElements = document.querySelectorAll(`.turma-${anoLetivo}`);
        turmaElements.forEach(element => {
            element.style.display = 'block';
        });
    }
</script>
@endsection
