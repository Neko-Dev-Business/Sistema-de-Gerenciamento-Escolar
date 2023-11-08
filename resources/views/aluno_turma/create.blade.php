@extends('layouts.default')

@section('conteudo')
    <div class="container">
        <form action="{{ route('aluno_turma.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <h2>Associar Aluno a Turma</h2>
                <label for="idPessoa">ID do Aluno:</label>
                <input type="text" name="idPessoa" class="form-control" value="{{ $aluno->idPessoa }} - {{ $aluno->nomePessoa }}" readonly>
            </div>
            <div class="form-group">
                <label for="idTurma">Turma:</label>
                <select name="idTurma" id="idTurma" class="form-control">
                    <option value="">Selecione uma Turma</option>
                    <!-- Opções de turma serão filtradas com base no ano letivo usando JavaScript -->
                    @foreach($turmas as $turma)
                        <option class="turma-{{ $turma->anoLetivoTurma }}" value="{{ $turma->idTurma }}">{{ $turma->nomeTurma }} - {{ $turma->anoLetivoTurma }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Associar</button>
        </form>

        @if (session('error'))
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-exclamation-triangle-fill text-danger"></i> Erro
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ session('error') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        function filterTurmas(anoLetivo) {
            // Ocultar todas as opções de turma
            const options = document.querySelectorAll('#idTurma option');
            options.forEach(option => {
                option.style.display = 'none';
            });

            // Exibir apenas as opções de turma com o ano letivo correspondente
            const turmaElements = document.querySelectorAll(`.turma-${anoLetivo}`);
            turmaElements.forEach(element => {
                element.style.display = 'block';
            });
        }

        // Fechar o modal ao clicar no botão 'Fechar'
        const closeButtons = document.querySelectorAll('.modal .close, .modal [data-dismiss="modal"]');
        closeButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
@endsection
