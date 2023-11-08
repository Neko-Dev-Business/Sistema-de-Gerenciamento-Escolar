@extends('layouts.default')

@section('conteudo')
    <div class="container">
        <form action="{{ route('aluno_turma.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <h2>Associar Aluno a Turma</h2>
                <label for="idPessoa">Nome do Aluno:</label>
                <input type="text" class="form-control" value="{{ $aluno->nomePessoa }}" readonly>
                <input type="hidden" name="idPessoa" value="{{ $aluno->idPessoa }}">
            </div>
            <div class="form-group">
                <label for="anoLetivo">Ano Letivo:</label>
                <select name="anoLetivo" id="anoLetivo" class="form-control" >
                    <option value="">Selecione um Ano Letivo</option>
                    @foreach ($anosLetivos as $ano)
                        <option value="{{ $ano }}">{{ $ano }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="idTurma">Turma:</label>
                <select name="idTurma" id="idTurma" class="form-control">
                    <option value="">Selecione uma Turma</option>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="submit" class="btn btn-primary mt-3 w-6">Associar</button>
              </div>

        </form>

        <!-- Modais de erro -->
        @if ($errors->any() || session('error'))
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
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            @endif
                            @if (session('error'))
                                <p>{{ session('error') }}</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="modal" tabindex="-1" role="dialog" style="display: block;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-check-circle-fill text-success"></i> Sucesso
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ session('success') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="window.location.href='{{ route('aluno_turma.index') }}'">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script>
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

        // Lógica para carregar turmas com base no ano letivo selecionado
        document.getElementById('anoLetivo').addEventListener('change', function() {
            const selectedAno = this.value;
            const turmas = {!! json_encode($turmasPorAno) !!};

            const turmasDropdown = document.getElementById('idTurma');
            turmasDropdown.innerHTML = '<option value="">Selecione uma Turma</option>';

            turmas[selectedAno].forEach(turma => {
                const option = document.createElement('option');
                option.value = turma.idTurma;
                option.textContent = turma.nomeTurma;
                turmasDropdown.appendChild(option);
            });
        });
    </script>
@endsection
