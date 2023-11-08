@extends('layouts.default')

@section('title', 'Relatórios')

@section('conteudo')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>Relatórios</h2>
            <hr>
            <div class="form-group">
                <label for="reportType">Selecione o tipo de relatório:</label>
                <select class="form-control mt-3" id="reportType" onchange="showFilterOptions()">
                    <option value="">-- Selecione --</option>
                    <option value="turmas">Relatório de Turmas</option>
                    <option value="disciplinas">Relatório de Disciplinas</option>
                    <option value="alunos">Relatório de Alunos</option>
                    <option value="comprovanteMatricula">Comprovante de Matrícula</option>
                </select>
            </div>
            <div id="filterOptions" style="display: none;">
                <div class="form-group mt-3">
                    <label for="filterBy">Filtrar por:</label>
                    <select class="form-control" id="filterBy">
                        <!-- As opções de filtro serão inseridas aqui pelo JavaScript -->
                    </select>
                </div>
                <div id="filterInput" class="form-group mt-3" style="display: none;">
                    <label for="filterValue">Valor do Filtro:</label>
                    <input type="text" class="form-control" id="filterValue" placeholder="Digite o valor do filtro">
                </div>
                <button class="btn btn-primary mt-3" onclick="generateReport()">
                    <i class="fas fa-download mr-2"></i> Baixar Relatório
                </button>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery-3.7.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
function showFilterOptions() {
    var reportType = document.getElementById('reportType').value;
    var filterOptions = document.getElementById('filterOptions');
    var filterBy = document.getElementById('filterBy');
    filterBy.innerHTML = ''; // Limpa as opções anteriores

    if (reportType) {
        filterOptions.style.display = 'block';

        // Define as opções de filtro com base no tipo de relatório selecionado
        var optionsHtml = '';
        switch (reportType) {
            case 'turmas':
                optionsHtml = `
                    <option value="nomeTurma">Nome da Turma</option>
                    <option value="anoLetivoTurma">Ano Letivo</option>
                `;
                break;
            case 'disciplinas':
                optionsHtml = `
                    <option value="nomeDisciplina">Nome da Disciplina</option>
                    <option value="codigoDisciplina">Código da Disciplina</option>
                    <option value="cargaHorariaDisciplina">Carga Horária</option>
                `;
                break;
            case 'alunos':
                optionsHtml = `
                    <option value="nomePessoa">Nome do Aluno</option>
                    <option value="cpfPessoa">CPF do Aluno</option>
                `;
                break;
            case 'comprovanteMatricula':
                optionsHtml = `
                    <option value="nomePessoa">Nome Aluno</option>
                `;
                break;
        }
        filterBy.innerHTML = optionsHtml;
        toggleFilterInput(); // Chama a função para exibir o campo de filtro
    } else {
        filterOptions.style.display = 'none';
    }
}

function toggleFilterInput() {
    var filterBy = document.getElementById('filterBy').value;
    var filterInput = document.getElementById('filterInput');
    filterInput.style.display = filterBy ? 'block' : 'none';
    // Atualize o placeholder com o nome do filtro selecionado
    if (filterBy) {
        document.getElementById('filterValue').placeholder = 'Digite o valor para ' + filterBy;
    }
}

function generateReport() {
    var reportType = document.getElementById('reportType').value;
    var filterBy = document.getElementById('filterBy').value;
    var filterValue = document.getElementById('filterValue').value;
    var url = '';

    switch (reportType) {
        case 'turmas':
            url = "{{ route('gerarRelatorioTurmas') }}";
            break;
        case 'disciplinas':
            url = "{{ route('gerarRelatorioDisciplinas') }}";
            break;
        case 'alunos':
            url = "{{ route('gerarRelatorioAlunos') }}";
            break;
        case 'comprovanteMatricula':
            url = "{{ route('gerarComprovanteMatricula') }}";
            break;
    }

    if (url && filterBy && filterValue) {
        window.location.href = `${url}?filterBy=${filterBy}&filterValue=${encodeURIComponent(filterValue)}`;
    } else {
        alert('Por favor, selecione um tipo de relatório e forneça um valor de filtro.');
    }
}
</script>
@endsection
