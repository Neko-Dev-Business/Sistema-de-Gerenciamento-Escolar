<!DOCTYPE html>
<html>
<head>
    <title>Comprovante de Matricula</title>
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
            <h1>Comprovante de Matricula</h1>
        </div>
        <div class="content">
            <p>Eu, <strong>{{ $diretoraEscola }}</strong>, Diretora da <strong>{{ $nomeEscola }}</strong>, atesto que
                <strong>{{ $nomePessoa }}</strong>, CPF nº <strong>{{ $cpfPessoa }}</strong>,
                filho(a) de <strong>{{ $nomeMae }}</strong>, encontra-se devidamente matriculado(a) no Ensino Fundamental II.
            </p>

            <p>Este documento tem a finalidade de comprovar a matrícula do aluno e suas informações pessoais, garantindo seu acesso
                às atividades e serviços escolares durante o período letivo. O aluno está autorizado a participar de todas as
                atividades educacionais oferecidas por esta instituição.</p>

            <h4>Informações Adicionais:</h4>
            <ul>
                <li><strong>Nome da Escola:</strong> {{ $nomeEscola }}</li>
                <li><strong>Endereço da Escola:</strong> {{ $enderecoEscola }}</li>
                <li><strong>Telefone da Escola:</strong> {{ $telefoneEscola }}</li>
                <li><strong>E-mail da Escola:</strong> {{ $emailEscola }}</li>
            </ul>

            <p>Este documento é válido a partir da data de emissão até o final do ano letivo. Qualquer dúvida ou necessidade
                de esclarecimento, favor entrar em contato com a secretaria da escola.</p>
        </div>
        <div class="signature">
            <p>Atenciosamente,</p>
            <img src="{{ public_path('images/layout/assinatura.jpg') }}" alt="Assinatura da Diretora" style="width: 150px; height: auto;">
            <p><strong>{{ $diretoraEscola }}</strong></p>
            <p>Diretora da <strong>{{ $nomeEscola }}</strong></p>
            <p>CNPJ da Escola: {{ $cnpjEscola }}</p>
        </div>
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
