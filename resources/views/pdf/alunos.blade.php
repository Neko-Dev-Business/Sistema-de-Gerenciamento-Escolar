<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Alunos</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Outros estilos -->
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Relatório de Alunos</h1>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>CPF</th>
                        <th>Data de Nasc.</th>
                        <th>Gênero</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nomePessoa }}</td>
                        <td>{{ $aluno->tipoPessoa }}</td>
                        <td>{{ $aluno->cpfPessoa }}</td>
                        <td>{{ $aluno->dataNascimentoPessoa->format('d/m/Y') }}</td>
                        <td>{{ $aluno->generoPessoa }}</td>
                        <td>{{ $aluno->telefonePessoa }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Data de Geração: <span class="generation-time">{{ now()->format('d/m/Y H:i') }}</span></p>
        </div>
    </div>
</body>
</html>


