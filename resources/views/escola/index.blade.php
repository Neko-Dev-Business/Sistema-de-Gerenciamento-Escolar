@extends('layouts.default')

@section('title', 'Dados da Escola')

@section('conteudo')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h1>Dados da Escola</h1>
            <hr>
            {{-- Verificar se existe uma escola cadastrada. Caso contrário, mostrar formulário vazio --}}
            @if($escola)
                <form action="{{ route('escola.update', $escola->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="nomeEscola" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomeEscola" name="nomeEscola" value="{{ $escola->nomeEscola }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="secretariaEscola" class="form-label">Secretário(a):</label>
                        <input type="text" class="form-control" id="secretariaEscola" name="secretariaEscola" value="{{ $escola->secretariaEscola }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="diretoraEscola" class="form-label">Diretor(a):</label>
                        <input type="text" class="form-control" id="diretoraEscola" name="diretoraEscola" value="{{ $escola->diretoraEscola }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="enderecoEscola" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="enderecoEscola" name="enderecoEscola" value="{{ $escola->enderecoEscola }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="assinaturaDiretoraEscola" class="form-label">Assinatura do Diretor(a):</label>
                        <input type="text" class="form-control" id="assinaturaDiretoraEscola" name="assinaturaDiretoraEscola" value="{{ $escola->assinaturaDiretoraEscola }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="cnpjEscola" class="form-label">CNPJ:</label>
                        <input type="text" class="form-control" id="cnpjEscola" name="cnpjEscola" value="{{ $escola->cnpjEscola }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
            @else
                <p>Não há dados cadastrados para a escola.</p>
                <a href="{{ route('escola.create') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus me-2"></i> Criar Dados da Escola
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
