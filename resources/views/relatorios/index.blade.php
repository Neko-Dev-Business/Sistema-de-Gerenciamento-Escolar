@extends('layouts.default')

@section('title', 'Relatórios')

@section('conteudo')
<div class="container mt-4">
    <h1>Relatórios</h1>
    <form action="#" method="post" id="relatorio-form">
        @csrf
        <div class="form-group">
            <label for="tipo">Relatório:</label>
            <select name="tipo" id="tipo" class="form-control">
                <option>Selecione</option>
                <option value="CM">Comprovante de Matrícula</option>
                <option value="RM">Relação de Alunos Matriculados</option>
            </select>
        </div>
        <div id="cm-fields" class="form-group" style="display: none;">
            <label for="nome">Nome do Aluno:</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div id="rm-fields" class="form-group" style="display: none;">
            <label for="ano">Ano:</label>
            <select name="ano" id="ano" class="form-control">
                <option value="2023">2023</option>
                <option value="2022">2022</option>
            </select>
            <label for="turma">Período:</label>
            <select name="turma" id="turma" class="form-control">
                <option value="A">9° Ano</option>
                <option value="B">8° Ano</option>
                <option value="C">7° Ano</option>
                <option value="D">6° Ano</option>
                <option value="E">5° Ano</option>
                <option value="F">4° Ano</option>
                <option value="G">3° Ano</option>
                <option value="H">2° Ano</option>
                <option value="I">1° Ano</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Gerar Relatório</button>
    </form>
</div>

<script>
    const tipoSelect = document.getElementById('tipo');
    const cmFields = document.getElementById('cm-fields');
    const rmFields = document.getElementById('rm-fields');

    tipoSelect.addEventListener('change', function () {
        const selectedTipo = tipoSelect.value;

        if (selectedTipo === 'CM') {
            cmFields.style.display = 'block';
            rmFields.style.display = 'none';
        } else if (selectedTipo === 'RM') {
            rmFields.style.display = 'block';
            cmFields.style.display = 'none';
        } else {
            cmFields.style.display = 'none';
            rmFields.style.display = 'none';
        }
    });
</script>
@endsection
