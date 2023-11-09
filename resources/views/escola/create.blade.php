@extends('layouts.default')

@section('title', 'Criar Dados da Escola')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5>Criar Dados da Escola</h5>
                <hr>
                <form action="{{ route('escola.store') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="nomeEscola" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomeEscola" name="nomeEscola" required>
                    </div>
                    <div class="mb-2">
                        <label for="secretariaEscola" class="form-label">Secretário(a):</label>
                        <input type="text" class="form-control" id="secretariaEscola" name="secretariaEscola" required>
                    </div>
                    <div class="mb-2">
                        <label for="diretoraEscola" class="form-label">Diretor(a):</label>
                        <input type="text" class="form-control" id="diretoraEscola" name="diretoraEscola" required>
                    </div>
                    <div class="mb-2">
                        <label for="enderecoEscola" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="enderecoEscola" name="enderecoEscola" required>
                    </div>
                    <div class="mb-2">
                        <label for="assinaturaDiretoraEscola" class="form-label">Assinatura do Diretor(a):</label>
                        <input type="text" class="form-control" id="assinaturaDiretoraEscola"
                            name="assinaturaDiretoraEscola" required>
                    </div>
                    <div class="mb-2">
                        <label for="telefoneEscola" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefoneEscola"
                            name="telefoneEscola" required>
                    </div>
                    <div class="mb-2">
                        <label for="emailEscola" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="emailEscola"
                            name="emailEscola" required>
                    </div>
                    <div class="mb-2">
                        <label for="cnpjEscola" class="form-label">CNPJ:</label>
                        <input type="text" class="form-control" id="cnpjEscola" name="cnpjEscola" required>
                    </div>
                    <button type="submit" class="btn btn-success">Criar</button>
                    <a href="{{ route('escola.index') }}" class="btn btn-secondary mt-3">
                        <i class="fas fa-arrow-left me-2"></i> Voltar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
