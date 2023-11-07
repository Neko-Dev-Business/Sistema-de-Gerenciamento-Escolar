<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Disciplinas</title>
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
            height: auto;
        }

        .page-header h1 {
            font-family: Verdana, sans-serif;
            font-size: 24px;
            margin-top: 20px;
        }

        .table-container {
            margin-top: 20px;
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
            <h1>Relatório de Disciplinas</h1>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Código da Disciplina</th>
                        <th>Nome da Disciplina</th>
                        <th>Carga Horária</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disciplinas as $disciplina)
                    <tr>
                        <td>{{ $disciplina->codigoDisciplina }}</td>
                        <td>{{ $disciplina->nomeDisciplina }}</td>
                        <td>{{ $disciplina->cargaHorariaDisciplina }} Horas</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Data de Geração: <span class="generation-time">{{ now()->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i') }}</span></p>
        </div>
    </div>
</body>

</html>
