<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Turmas</title>
    <style>
        /* Estilos CSS personalizados aqui */
    </style>
</head>
<body>
    <h1>Relatório de Turmas</h1>

    <table>
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
</body>
</html>
