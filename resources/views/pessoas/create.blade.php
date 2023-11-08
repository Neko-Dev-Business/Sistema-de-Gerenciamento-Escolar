@extends('layouts.default')

@section('title', 'Cadastrar Pessoa')

@section('conteudo')
    <div class="container">
        <h1 class="mb-3">Cadastro de Usuário</h1>
        <div class="alert alert-danger text-center p-2" style="display: none" id="div-alert-2"></div>
        <form class="row g-4" method="POST" action="{{ route('pessoas.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Abas para alternar entre "Informações Pessoais" e "Endereço" -->
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link active" id="pessoais-tab" data-bs-toggle="tab" href="#pessoais" role="tab"
                        aria-controls="pessoais" aria-selected="true">Informações Pessoais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="endereco-tab" data-bs-toggle="tab" href="#endereco" role="tab"
                        aria-controls="endereco" aria-selected="false">Endereço</a>
                </li>
            </ul>

        <!-- Conteúdo das abas -->
        <div class="tab-content" id="myTabContent">
            <!-- Aba "Endereço" -->
            <div class="tab-pane fade mt-3" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Campos de Endereço -->
                        <div class="form-group">
                            <label for="cepEndereco">CEP:</label>
                            <input type="text" class="form-control form-control-lg bg-light" id="cepEndereco" name="cepEndereco"
                                required onblur="pesquisaCep(this.value);" maxlength="9">
                        </div>
                        <div class="form-group">
                            <label for="logradouroEndereco">Rua:</label>
                            <input type="text" class="form-control" id="logradouroEndereco" name="logradouroEndereco" required>
                        </div>
                        <div class="form-group">
                            <label for="numeroEndereco">Número:</label>
                            <input type="text" class="form-control" id="numeroEndereco" name="numeroEndereco" required>
                        </div>
                        <div class="form-group">
                            <label for="complementoEndereco">Complemento:</label>
                            <input type="text" class="form-control" id="complementoEndereco" name="complementoEndereco">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bairroEndereco">Bairro:</label>
                            <input type="text" class="form-control" id="bairroEndereco" name="bairroEndereco" required>
                        </div>
                        <div class="form-group">
                            <label for="cidadeEndereco">Cidade:</label>
                            <input type="text" class="form-control" id="cidadeEndereco" name="cidadeEndereco" required>
                        </div>
                        <div class="form-group">
                            <label for="ufEndereco">Estado (Sigla): </label>
                            <input type="text" class="form-control" id="ufEndereco" name="ufEndereco" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Aba "Informações Pessoais" -->
            <div class="tab-pane fade show active" id="pessoais" role="tabpanel" aria-labelledby="pessoais-tab">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <!-- Campos de Informações Pessoais -->
                        <!--Tipo da Pessoa-->
                        <div class="form-group">
                            <label for="tipoPessoa" class="form-label fs-5 fs-5">Tipo da Pessoa</label>
                            <select name="tipoPessoa" id="tipoPessoa" class="form-select form-select-lg bg-light" onchange="controleTipo()"
                                required>
                                <option value="" selected="selected">Selecione</option>
                                <option value="F">Física</option>
                                <option value="J">Jurídica</option>
                            </select>
                        </div>
                    </div>
                    <!-- Pessoa Física -->
                    <div class="col-md-6">
                        <div class="form-group" id="div-cpfPessoa">
                            <label for="cpfPessoa">CPF:</label>
                            <input type="text" class="form-control" id="cpfPessoa" name="cpfPessoa" placeholder="Apenas Números" pattern="\d*"
                                maxlength="14" minlength="11">
                        </div>
                        <div class="form-group" id="div-rgPessoa">
                            <label for="rgPessoa">RG:</label>
                            <input type="text" class="form-control" id="rgPessoa" name="rgPessoa">
                        </div>
                        <div class="form-group" id="div-dataNascimentoPessoa">
                            <label for="dataNascimentoPessoa">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dataNascimentoPessoa" name="dataNascimentoPessoa">
                        </div>
                        <div class="form-group" id="div-generoPessoa">
                            <label for="generoPessoa">Gênero:</label>
                            <select class="form-select" id="generoPessoa" name="generoPessoa">
                                <option value="" selected="selected">Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                        <div class="form-group" id="div-nacionalidadePessoa">
                            <label for="nacionalidadePessoa">Nacionalidade:</label>
                            <input type="text" class="form-control" id="nacionalidadePessoa" name="nacionalidadePessoa">
                        </div>
                        <div class="form-group" id="div-nomePaiPessoa">
                            <label for="nomePaiPessoa">Filiação (Pai):</label>
                            <input type="text" class="form-control" id="nomePaiPessoa" name="nomePaiPessoa">
                        </div>
                        <div class="form-group" id="div-nomeMaePessoa">
                            <label for="nomeMaePessoa" >Filiação (Mãe):</label>
                            <input type="text" class="form-control" id="nomeMaePessoa" name="nomeMaePessoa">
                        </div>
                        <!-- Pessoa Jurídica -->
                        <div class="form-group" id="div-cnpjPessoa">
                            <label for="cnpjPessoa">CNPJ:</label>
                            <input type="text" class="form-control" id="cnpjPessoa" name="cnpjPessoa" placeholder="Apenas Números"
                                   maxlength="20" minlength="14" onblur="pesquisaCNPJ(this.value);">
                        </div>
                    </div>
                    <!-- Outras Informações Pessoais -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nomePessoa">Nome:</label>
                            <input type="text" class="form-control" id="nomePessoa" name="nomePessoa">
                        </div>
                        <div class="form-group">
                            <label for="emailPessoa">E-mail:</label>
                            <input type="email" class="form-control" id="emailPessoa" name="emailPessoa">
                        </div>
                        <div class="form-group">
                            <label for="telefonePessoa">Telefone:</label>
                            <input type="tel" placeholder="(99) 9999-9999" maxlength="18"
                                title="Número de telefone precisa ser no formato (99) 9999-9999"
                                class="form-control form-control-lg bg-light" id="telefonePessoa" name="telefonePessoa" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="usuarioPessoa">Nome de Usuário:</label>
                            <input type="text" class="form-control" id="usuarioPessoa" name="usuarioPessoa">
                        </div>
                        <div class="form-group">
                            <label for="tipoUsuario">Tipo de Usuário:</label>
                            <select class="form-select" id="tipoUsuario" name="tipoUsuario">
                                <option value="" selected="selected">Selecione</option>
                                <option value="1">Aluno</option>
                                <option value="2">Professor</option>
                                <option value="3">Responsável</option>
                                <option value="4">Funcionário</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="code">Código:</label>
                            <input type="text" class="form-control" id="code" name="code">
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
            </div>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('pessoas.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>


    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/template.js"></script>
    <script>
        function generateEmail() {
            const nameInput = document.getElementById('nomePessoa');
            const emailInput = document.getElementById('usuarioPessoa');

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
        const nameInput = document.getElementById('nomePessoa');
        nameInput.addEventListener('input', generateEmail);
    </script>

    <!-- Seção para exibir mensagens de erro -->
    @if(session('Erro'))
        <div class="modal" id="errorModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-exclamation-circle text-danger mr-2"></i>Erro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('Erro') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            myModal.show();
        </script>
    @endif

    <!-- Seção para exibir mensagens de sucesso -->
    @if(session('Sucesso'))
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sucesso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('Sucesso') }}
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    @endif

@endsection
