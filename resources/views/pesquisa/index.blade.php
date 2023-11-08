@extends('layouts.default')

@section('title', 'Pesquisa de Alunos')

@section('conteudo')
<div class="container">
    <h1>Pesquisa de Alunos</h1>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Pesquisar Aluno" aria-label="Pesquisar Aluno" aria-describedby="button-pesquisar">
        <button class="btn btn-primary" type="button" id="button-pesquisar">
            <i class="bi bi-search"></i> Pesquisar
        </button>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123456</td>
                        <td>João da Silva</td>
                        <td>123.456.789-00</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroModal">
                                <i class="bi bi-search"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>123456</td>
                        <td>João da Silva</td>
                        <td>123.456.789-00</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroModal">
                                <i class="bi bi-search"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>123456</td>
                        <td>João da Silva</td>
                        <td>123.456.789-00</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroModal">
                                <i class="bi bi-search"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>123456</td>
                        <td>João da Silva</td>
                        <td>123.456.789-00</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroModal">
                                <i class="bi bi-search"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal de Cadastro de Aluno -->
<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroModalLabel">Cadastro de Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <!-- Coloque aqui o formulário de cadastro de aluno -->
                <!-- Você pode usar o mesmo formulário que foi criado anteriormente -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar Aluno</button>
            </div>
        </div>
    </div>
</div>
@endsection
