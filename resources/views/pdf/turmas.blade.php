<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Turmas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos CSS personalizados aqui */
        body {
            border: 2cm; /* Adiciona borda de 2cm */
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
</head>

<body>
    <div class="container">
        <!-- Cabeçalho com imagem de placeholder -->
        <div class="page-header">
            <h1>Relatório de Turmas</h1>
            <img src="{{ public_path("/images/layout/header.jpg") }}" alt="" style="width: 600px; height: 150px;">
        </div>

        <!-- Tabela estilizada com Bootstrap -->
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
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
            <p>Página <span class="page-number">1</span> de <span class="total-pages"></span></p>
            <p>Hora de Geração: <span class="generation-time"></span></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Contar as páginas usando jQuery
        var rowsPerPage = 10; // Defina o número de linhas por página
        var totalRows = {{ count($turmas) }}; // Obtém o total de linhas da sua consulta

        // Calcule o número de páginas com base nas linhas e linhas por página
        var totalPages = Math.ceil(totalRows / rowsPerPage);

        // Atualize o número da página atual e exiba-o
        $('.total-pages').text(totalPages);

        // Exiba a hora de geração (pode personalizar isso)
        var generationTime = new Date().toLocaleString();
        $('.generation-time').text(generationTime);
    </script>
</body>

</html>
