@extends('layouts.default')

@section('title', 'Editar Usuário')

@section('conteudo')
<div class="container">
    <h1 class="mb-5">Editar Usuário</h1>
    <form class="row g-4" method="POST" action="{{ route('pessoas.update', $pessoas->idPessoa) }}">
        @csrf
        @method('PUT')
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
        <div class="tab-content" id="myTabContent">
            <!-- Aba "Endereço" -->
            <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                <!-- Aqui você incluirá os campos de endereço, preenchendo-os com os dados do endereço -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- Campos de Endereço -->
                        <div class="form-group">
                            <label for="cepEndereco">CEP:</label>
                            <input type="text" class="form-control form-control-lg bg-light" id="cepEndereco"
                                name="cepEndereco" required onblur="pesquisaCep(this.value);" maxlength="9"
                                value="{{ $enderecos->cepEndereco }}" required>
                        </div>
                        <div class="form-group">
                            <label for="logradouroEndereco">Rua:</label>
                            <input type="text" class="form-control" id="logradouroEndereco" name="logradouroEndereco"
                                value="{{ $enderecos->logradouroEndereco }}" required>
                        </div>
                        <div class="form-group">
                            <label for="numeroEndereco">Número:</label>
                            <input type="text" class="form-control" id="numeroEndereco" name="numeroEndereco"
                                value="{{ $enderecos->numeroEndereco }}" required>
                        </div>
                        <div class="form-group">
                            <label for="complementoEndereco">Complemento:</label>
                            <input type="text" class="form-control" id="complementoEndereco" name="complementoEndereco"
                                value="{{ $enderecos->complementoEndereco }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bairroEndereco">Bairro:</label>
                            <input type="text" class="form-control" id="bairroEndereco" name="bairroEndereco"
                                value="{{ $enderecos->bairroEndereco }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cidadeEndereco">Cidade:</label>
                            <input type="text" class="form-control" id="cidadeEndereco" name="cidadeEndereco"
                                value="{{ $enderecos->cidadeEndereco }}" required>
                        </div>
                        <div class="form-group">
                            <label for="ufEndereco">Estado:</label>
                            <input type="text" class="form-control" id="ufEndereco" name="ufEndereco"
                                value="{{ $enderecos->ufEndereco }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Aba "Informações Pessoais" -->
            <div class="tab-pane fade show active" id="pessoais" role="tabpanel" aria-labelledby="pessoais-tab">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Campos de Informações Pessoais -->
                        <!--Tipo da Pessoa-->
                        <div class="form-group">
                            <label for="tipoPessoa" class="form-label fs-5">Tipo da Pessoa</label>
                            <select name="tipoPessoa" id="tipoPessoa" class="form-select form-select-lg bg-light"
                                onchange="controleTipo()" required>
                                <option value="">Selecione</option>
                                <option value="F" {{ $pessoas->tipoPessoa == 'F' ? 'selected' : '' }}>Física</option>
                                <option value="J" {{ $pessoas->tipoPessoa == 'J' ? 'selected' : '' }}>Jurídica
                                </option>
                            </select>
                        </div>
                    </div>
                    <!-- Pessoa Física -->
                    <div class="col-md-6">
                        <div class="form-group" id="div-cpfPessoa">
                            <label for="cpfPessoa">CPF:</label>
                            <input type="text" class="form-control" id="cpfPessoa" name="cpfPessoa"
                                value="{{ $pessoas->cpfPessoa }}" placeholder="Apenas Números" pattern="\d*"
                                maxlength="14" minlength="11" required>
                        </div>
                        <div class="form-group" id="div-rgPessoa">
                            <label for="rgPessoa">RG:</label>
                            <input type="text" class="form-control" id="rgPessoa" name="rgPessoa"
                                value="{{ $pessoas->rgPessoa }}" required>
                        </div>
                        <div class="form-group" id="div-dataNascimentoPessoa">
                            <label for="dataNascimentoPessoa">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dataNascimentoPessoa"
                                name="dataNascimentoPessoa" value="{{ $pessoas->dataNascimentoPessoa }}" required>
                        </div>
                        <div class="form-group" id="div-generoPessoa">
                            <label for="generoPessoa">Gênero:</label>
                            <select class="form-select" id="generoPessoa" name="generoPessoa" required>
                                <option value="">Selecione</option>
                                <option value="M" {{ $pessoas->generoPessoa == 'M' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="F" {{ $pessoas->generoPessoa == 'F' ? 'selected' : '' }}>Feminino
                                </option>
                            </select>
                        </div>
                        <div class="form-group" id="div-nacionalidadePessoa">
                            <label for="nacionalidadePessoa">Nacionalidade:</label>
                            <input type="text" class="form-control" id="nacionalidadePessoa"
                                name="nacionalidadePessoa" value="{{ $pessoas->nacionalidadePessoa }}" required>
                        </div>
                        <div class="form-group" id="div-nomePaiPessoa">
                            <label for="nomePaiPessoa">Filiação (Pai):</label>
                            <input type="text" class="form-control" id="nomePaiPessoa" name="nomePaiPessoa"
                                value="{{ $pessoas->nomePaiPessoa }}" required>
                        </div>
                        <div class="form-group" id="div-nomeMaePessoa">
                            <label for="nomeMaePessoa">Filiação (Mãe):</label>
                            <input type="text" class="form-control" id="nomeMaePessoa" name="nomeMaePessoa"
                                value="{{ $pessoas->nomeMaePessoa }}" required>
                        </div>
                    </div>
                    <!-- Pessoa Jurídica -->
                    <div class="col-md-6" id="div-cnpjPessoa"
                        style="{{ $pessoas->tipoPessoa == 'F' ? 'display: none;' : '' }}">
                        <div class="form-group">
                            <label for="cnpjPessoa">CNPJ:</label>
                            <input type="text" class="form-control" id="cnpjPessoa" name="cnpjPessoa"
                                value="{{ $pessoas->cnpjPessoa }}" placeholder="Apenas Números" maxlength="20"
                                minlength="14">
                        </div>
                    </div>
                    <!-- Outras Informações Pessoais -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nomePessoa">Nome:</label>
                            <input type="text" class="form-control" id="nomePessoa" name="nomePessoa"
                                value="{{ $pessoas->nomePessoa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="emailPessoa">E-mail:</label>
                            <input type="email" class="form-control" id="emailPessoa" name="emailPessoa"
                                value="{{ $pessoas->emailPessoa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="telefonePessoa">Telefone:</label>
                            <input type="tel" class="form-control form-control-lg bg-light" id="telefonePessoa"
                                name="telefonePessoa" value="{{ $pessoas->telefonePessoa }}"
                                placeholder="(99) 9999-9999" maxlength="18"
                                title="Número de telefone precisa ser no formato (99) 9999-9999" required>
                        </div>
                        <div class="form-group">
                            <label for="usuarioPessoa">Nome de Usuário:</label>
                            <input type="text" class="form-control" id="usuarioPessoa" name="usuarioPessoa"
                                value="{{ $pessoas->usuarioPessoa }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tipoUsuario">Tipo de Usuário:</label>
                            <select class="form-select" id="tipoUsuario" name="tipoUsuario" required>
                                <option value="1" {{ $pessoas->tipoUsuario == '1' ? 'selected' : '' }}>Aluno</option>
                                <option value="2" {{ $pessoas->tipoUsuario == '2' ? 'selected' : '' }}>Professor</option>
                                <option value="3" {{ $pessoas->tipoUsuario == '3' ? 'selected' : '' }}>Responsável</option>
                                <option value="4" {{ $pessoas->tipoUsuario == '4' ? 'selected' : '' }}>Responsável</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="TEXT" class="form-control" id="password" name="password" value="{{ $pessoas->password }}" required>
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
</div>
    <script>
        window.onload = function() {
            controleTipoAoEntrarEdit()
        }
    </script>
@endsection
