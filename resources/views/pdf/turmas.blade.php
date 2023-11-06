<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Turmas</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
    <style>
        /* Estilos CSS personalizados aqui */
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .table-container {
            margin: 0 auto;
            width: 95%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table {
            margin-bottom: 0;
        }

        .page-header {
            text-align: center;
            padding: 20px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .table-container {
            margin: 0 auto;
            width: 95%;
        }

        .footer {
            text-align: right;
        }
    </style>


<body>
    <div class="container">
        <div class="page-header">
            <img src="{{ public_path("/images/layout/header.png") }}" alt="" style="width: 600px; height: 150px;">
            <h1>Relatório de Turmas</h1>
        </div>

        <div class="table-container">
            <table class="table table-sstriped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome da Turma</th>
                        <th>Turno</th>
                        <th>Ano Letivo</th>
                        <th>Sala</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($turmas as $turma)
                    <tr>
                        <td>{{ $turma->id }}</td>
                        <td>{{ $turma->nomeTurma }}</td>
                        <td>{{ $turma->turnoTurma }}</td>
                        <td>{{ $turma->anoLetivoTurma }}</td>
                        <td>{{ $turma->salaTurma }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Rodapé com informações adicionais -->
        <div class="footer">
            <p>Data de Geração: <span class="generation-time">{{ now()->format('d/m/Y H:i') }}</span></p>
        </div>
    </div>
</body>

</html>
