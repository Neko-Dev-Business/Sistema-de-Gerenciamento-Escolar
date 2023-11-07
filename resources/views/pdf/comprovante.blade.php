<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovante de Matrícula</title>
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
        <div class="header">
            <img src="{{ public_path('images/banner2.png') }}" alt="Logo da Escola">
            <h2>COMPROVANTE DE MATRÍCULA</h2>
        </div>
        <div class="content">
            <p>Eu, <strong>{{ $diretoraEscola }}</strong>, Diretora da <strong>{{ $nomeEscola }}</strong>, atesto que
                <strong>{{ $nomeAluno }}</strong>, CPF nº <strong>{{ $cpfPessoa }}</strong>, nascido(a) em <strong>{{ $dataNascimentoAluno }}</strong>,
                filho(a) de <strong>{{ $nomeMae }}</strong>, encontra-se devidamente matriculado(a) no <strong>{{ $nomeCursoSerie }}</strong>
                para o ano letivo de <strong>{{ $anoLetivo }}</strong>.</p>

            <p>Este documento tem a finalidade de comprovar a matrícula do aluno e suas informações pessoais, garantindo seu acesso
                às atividades e serviços escolares durante o período letivo. O aluno está autorizado a participar de todas as
                atividades educacionais oferecidas por esta instituição.</p>

            <h4>Informações Adicionais:</h4>
            <ul>
                <li><strong>Nome da Escola:</strong> {{ $nomeEscola }}</li>
                <li><strong>Endereço da Escola:</strong> {{ $enderecoEscola }}</li>
                <li><strong>Telefone da Escola:</strong> {{ $telefoneEscola }}</li>
                <li><strong>E-mail da Escola:</strong> {{ $emailEscola }}</li>
                <li><strong>Período Letivo:</strong> Ano Letivo de {{ $anoLetivo }}</li>
                <li><strong>Curso ou Série Matriculada:</strong> {{ $nomeCursoSerie }}</li>
                <li><strong>Data de Emissão:</strong> {{ $dataEmissao }}</li>
            </ul>

            <p>Este documento é válido a partir da data de emissão até o final do ano letivo. Qualquer dúvida ou necessidade
                de esclarecimento, favor entrar em contato com a secretaria da escola.</p>
        </div>
        <div class="signature">
            <p>Atenciosamente,</p>
            <img src="{{ public_path('images/familia.jpg') }}" alt="Assinatura da Diretora" style="width: 150px; height: auto;">
            <p><strong>{{ $diretoraEscola }}</strong></p>
            <p>Diretora da <strong>{{ $nomeEscola }}</strong></p>
            <p>CNPJ da Escola: {{ $cnpjEscola }}</p>
        </div>
    </div>
</body>

</html>

