<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Alunos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-header {
            text-align: center;
            margin: 0 auto;
        }

        .page-header img {
            width: 100%;
            max-width: 1000px;
            height: 30%;
        }

        .page-header h1 {
            font-family: Verdana, sans-serif;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .thead-dark th {
            background-color: #333;
            color: #fff;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 14px;
        }
        </style>

</head>
<body>
    <div class="container">
        <div class="page-header">
            <img src="{{ public_path("/images/layout/banner2.png") }}" alt="">
            <h1>Relatório de Alunos</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered ml-5 mr-5">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nasc.</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nomePessoa }}</td>
                        <td>{{ substr($aluno->cpfPessoa, 0, 3) . '.' . substr($aluno->cpfPessoa, 3, 3) . '.' . substr($aluno->cpfPessoa, 6, 3) . '-' . substr($aluno->cpfPessoa, 9, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($aluno->dataNascimentoPessoa)->format('d/m/Y') }}</td>
                        <td>{{ '('.substr($aluno->telefonePessoa, 0, 2) . ') ' . substr($aluno->telefonePessoa, 2, 4) . '-' . substr($aluno->telefonePessoa, 6) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Data de Geração: <span class="generation-time">{{ now()->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i') }}</span></p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
