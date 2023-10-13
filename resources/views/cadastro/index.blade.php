@extends('layouts.default')

@section('title', 'Cadastro')

@section('conteudo')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/images/layout/icon_arpa.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <h1 class="mb-3">Cadastro de Alunos</h1>

    <div class="container">
        <form action="#" method="POST">
            @csrf

            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link active" id="pessoais-tab" data-toggle="tab" href="#pessoais" role="tab" aria-controls="pessoais" aria-selected="true">Informações Pessoais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="endereco-tab" data-toggle="tab" href="#endereco" role="tab" aria-controls="endereco" aria-selected="false">Endereço</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pessoais" role="tabpanel" aria-labelledby="pessoais-tab">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Informações Pessoais -->
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="code">Código:</label>
                                <input type="text" class="form-control" id="code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="username">Nome de Usuário:</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_type">Tipo de Usuário:</label>
                                <input type="text" class="form-control" id="user_type" name="user_type">
                            </div>
                            <div class="form-group">
                                <label for="dob">Data de Nascimento:</label>
                                <input type="text" class="form-control" id="dob" name="dob">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gênero:</label>
                                <input type="text" class="form-control" id="gender" name="gender">
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto:</label>
                                <input type="text" class="form-control" id="foto" name="foto" placeholder="URL da foto">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Documentos -->
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf" name="cpf">
                            </div>
                            <div class="form-group">
                                <label for="rg">RG:</label>
                                <input type="text" class="form-control" id="rg" name="rg">
                            </div>
                            <div class="form-group">
                                <label for="nacionalidade">Nacionalidade:</label>
                                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade">
                            </div>
                            <div class="form-group">
                                <label for="filiacao_pai">Filiação (Pai):</label>
                                <input type="text" class="form-control" id="filiacao_pai" name="filiacao_pai">
                            </div>
                            <div class="form-group">
                                <label for="filiacao_mae">Filiação (Mãe):</label>
                                <input type="text" class="form-control" id="filiacao_mae" name="filiacao_mae">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Endereço -->
                            <div class="form-group">
                                <label for="logradouro">Logradouro:</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro">
                            </div>
                            <div class="form-group">
                                <label for="bairro">Bairro:</label>
                                <input type="text" class="form-control" id="bairro" name="bairro">
                            </div>
                            <div class="form-group">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" id="cep" name="cep">
                            </div>
                            <div class="form-group">
                                <label for="numero">Número:</label>
                                <input type="text" class="form-control" id="numero" name="numero">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" name="cidade">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <input type="text" class="form-control" id="estado" name="estado">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Senha -->
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <!-- Confirmação de Senha -->
            <div class="form-group">
                <label for="password_confirmation">Confirme a Senha:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
@endsection
