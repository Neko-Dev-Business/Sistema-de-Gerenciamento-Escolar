@extends('layouts.default')

@section('title', 'Cadastro de Usuários')

@section('conteudo')
    <h1 class="mb-3">Cadastro de Usuário</h1>

    <form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Abas para alternar entre "Informações Pessoais" e "Endereço" -->
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="pessoais-tab" data-bs-toggle="tab" href="#pessoais" role="tab" aria-controls="pessoais" aria-selected="true">Informações Pessoais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="endereco-tab" data-bs-toggle="tab" href="#endereco" role="tab" aria-controls="endereco" aria-selected="false">Endereço</a>
            </li>
        </ul>

        <!-- Conteúdo das abas -->
        <div class="tab-content" id="myTabContent">
            <!-- Aba "Informações Pessoais" -->
            <div class="tab-pane fade show active" id="pessoais" role="tabpanel" aria-labelledby="pessoais-tab">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <!-- Campos de Informações Pessoais -->
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
                            <label for="usuario">Nome de Usuário:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario">
                        </div>
                    </div>
                    <!-- Outras Informações Pessoais -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user_type">Tipo de Usuário:</label>
                            <select class="form-select" id="user_type" name="user_type">
                                <option value="A">Aluno</option>
                                <option value="P">Professor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dob">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gênero:</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="">Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                    </div>
                    <!-- Documentos -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Apenas Números" pattern="\d*">
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
                    <!-- Campo de Senha -->
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="password" name="password">
                            <button type="button" class="btn btn-primary" onclick="generateRandomPassword()">Gerar Senha Aleatória</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aba "Endereço" -->
            <div class="tab-pane fade mt-3" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Campos de Endereço -->
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

        <!-- Botão de envio -->
        <button type="submit" class="btn btn-primary mt-5">Cadastrar</button>
    </form>

    <!-- Corrija a URL do arquivo Bootstrap sem o sinal "@" -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/template.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Corrija a URL do arquivo Bootstrap sem o sinal "@" -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/template.js"></script>
    <script>
        function generateEmail() {
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('usuario');

            // Remove espaços em branco do início e do fim do nome
            const trimmedName = nameInput.value.trim();

            // Divide o nome em palavras com base nos espaços em branco
            const nameParts = trimmedName.split(' ');

            // Pega o primeiro e o segundo nome (se existirem)
            let firstName = '';
            let lastName = '';

            if (nameParts.length > 0) {
                firstName = nameParts[0];
            }

            if (nameParts.length > 1) {
                lastName = nameParts[1];
            }

            // Substitui espaços em branco por underscores e converte para minúsculas
            const sanitizedName = `${firstName}_${lastName}`.toLowerCase();

            // Preenche o campo de e-mail com o formato desejado
            emailInput.value = sanitizedName + '@sysedu.com';
        }

        // Adicione um ouvinte de evento de entrada ao campo de nome
        const nameInput = document.getElementById('name');
        nameInput.addEventListener('input', generateEmail);
    </script>
@endsection
