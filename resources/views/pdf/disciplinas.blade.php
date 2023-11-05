<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Disciplinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="page-header text-center my-4">
            <!-- Certifique-se de que o caminho para a imagem está correto -->
            <img src="{{ public_path('images/layout/header.png') }}" alt="Cabeçalho" style="width: 600px; height: 150px;">
            <h1>Relatório de Disciplinas</h1>
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Código da Disciplina</th>
                        <th>Nome da Disciplina</th>
                        <th>Carga Horária</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disciplinas as $disciplina)
                    <tr>
                        <td>{{ $disciplina->idDisciplina }}</td>
                        <td>{{ $disciplina->codigoDisciplina }}</td>
                        <td>{{ $disciplina->nomeDisciplina }}</td>
                        <td>{{ $disciplina->cargaHorariaDisciplina }} Horas</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Hora de Geração: <span class="generation-time">{{ now()->format('H:i:s') }}</span></p>
        </div>
    </div>
</body>

</html>
