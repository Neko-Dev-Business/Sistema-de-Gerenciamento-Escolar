<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim do Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <div class="col-lg-12 table-responsive p-0" id="table-bulletin-print">
        <table id="table-bulletin" class="table table-bordered mt-3">
            <thead class="text-center">
                <tr>
                    <th rowspan="2" scope="col" class="align-middle">Disciplinas</th>
                    <th colspan="3" scope="col">Unidade I</th>
                    <th colspan="3" scope="col">Unidade II</th>
                    <th colspan="3" scope="col">Unidade III</th>
                    <th colspan="3" scope="col">Unidade IV</th>
                    <th rowspan="2" scope="col" class="align-middle">Média Final</th>
                    <th rowspan="2" scope="col" class="align-middle">Resultado Final</th>
                </tr>
                <tr>
                    <th scope="col">Nota</th>
                    <th scope="col">Faltas</th>
                    <th scope="col">Rec</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Faltas</th>
                    <th scope="col">Rec</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Faltas</th>
                    <th scope="col">Rec</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Faltas</th>
                    <th scope="col">Rec</th>
                </tr>
            </thead>
            <tbody>
                <!-- Utilize um loop do Laravel para percorrer os registros de notas -->
                @foreach ($notas as $nota)
                <tr class="text-center">
                    <td>{{ $nota->nomeDisciplina }}</td>
                    <td>{{ $nota->FinalNota1 }}</td>
                    <td>1</td> <!-- Substituir pelo número de faltas -->
                    <td>{{ $nota->Rec1 ?: '-' }}</td>
                    <td>{{ $nota->FinalNota2 }}</td>
                    <td>3</td> <!-- Substituir pelo número de faltas -->
                    <td>{{ $nota->Rec2 ?: '-' }}</td>
                    <td>{{ $nota->FinalNota3 }}</td>
                    <td>2</td> <!-- Substituir pelo número de faltas -->
                    <td>{{ $nota->Rec3 ?: '-' }}</td>
                    <td>{{ $nota->FinalNota4 }}</td>
                    <td>4</td> <!-- Substituir pelo número de faltas -->
                    <td>{{ $nota->Rec4 ?: '-' }}</td>
                    <td>{{ $nota->MediaFinal }}</td>
                    <td>{{ $nota->ResultadoFinal }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <div class="footer">
                    <p>Data de Geração: <span class="generation-time">{{ now()->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i') }}</span></p>
                </div>
            </tfoot>
        </table>

    </div>
</div>

<!-- Scripts do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
