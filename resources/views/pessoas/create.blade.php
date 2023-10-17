@extends('layouts.default')

@section('title', 'Cadastrar Pessoa')

@section('conteudo')
    <h1 class="mb-3">Cadastro de Usuário</h1>
    <h2>Pessoa</h2><br/>
    <div class="alert alert-danger text-center p-2" style="display: none" id="div-alert-2"></div>
    <form class="row g-4" method="POST" action="{{ route('pessoas.store') }}" enctype="multipart/form-data">
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
                            <label for="ufEndereco">Estado:</label>
                            <select class="form-select form-select-lg bg-light" id="ufEndereco" name="ufEndereco" required>
                                <option value=""></option>
                                @foreach ($UFs as $uf)
                                    <option value=" {{ $uf->ufSigla }} "> {{ $uf->ufDescricao }} </option>
                                @endforeach
                            </select>
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
                                <option value="F" selected="selected">Física</option>
                                <option value="J">Jurídica</option>
                            </select>
                        </div>
                    </div>
                    <!-- Pessoa Física -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpfPessoa">CPF:</label>
                            <input type="text" class="form-control" id="cpfPessoa" name="cpfPessoa" placeholder="Apenas Números" pattern="\d*" 
                                maxlength="14" minlength="11">
                        </div>
                        <div class="form-group">
                            <label for="rgPessoa">RG:</label>
                            <input type="text" class="form-control" id="rgPessoa" name="rgPessoa">
                        </div>
                        <div class="form-group">
                            <label for="dataNascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
                        </div>
                        <div class="form-group">
                            <label for="generoPessoa">Gênero:</label>
                            <select class="form-select" id="generoPessoa" name="generoPessoa">
                                <option value="">Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="nacionalidadePessoa">Nacionalidade:</label>
                            <input type="text" class="form-control" id="nacionalidadePessoa" name="nacionalidadePessoa">
                        </div>
                        <div class="form-group">
                            <label for="nomePaiPessoa">Filiação (Pai):</label>
                            <input type="text" class="form-control" id="nomePaiPessoa" name="nomePaiPessoa">
                        </div>
                        <div class="form-group">
                            <label for="nomeMaePessoa">Filiação (Mãe):</label>
                            <input type="text" class="form-control" id="nomeMaePessoa" name="nomeMaePessoa">
                        </div>
                        <!-- Pessoa Jurídica -->
                        <div class="form-group">
                            <label for="cnpjPessoa">CNPJ:</label>
                            <input type="text" class="form-control" id="cnpjPessoa" name="cnpjPessoa" placeholder="Apenas Números" pattern="\d*" 
                                   maxlength="18" minlength="14" onblur="pesquisaCNPJ(this.value);">
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
                            <label for="user_type">Tipo de Usuário:</label>
                            <select class="form-select" id="user_type" name="user_type">
                                <option value="A">Aluno</option>
                                <option value="P">Professor</option>
                                <option value="R">Responsável</option>
                                <option value="E">Empresa Parceira</option>
                                <option value="F">Funcionário</option>
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

@endsection
