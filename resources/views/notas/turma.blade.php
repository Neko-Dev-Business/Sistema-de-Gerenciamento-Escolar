<!-- Modal -->
<div class="modal fade" id="modal-turma-{{ $pessoa->idPessoa }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ATENÇÃO!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Escolha a turma que deseja ver as notas do Aluno:</p>
                <p><strong>{{ $pessoa->nomePessoa }}</strong></p>
                <div class="form-group">
                    <label for="nomeTurma">Turma:</label>
                    <select class="form-select form-select-lg bg-light" id="nomeTurma" name="nomeTurma" required>
                        <option value="">Escolha uma turma</option>
                        @if ($pessoa->alunoTurma->isEmpty())
                            <option value="" disabled>O aluno não está vinculado a uma turma</option>
                        @else
                            @foreach ($pessoa->alunoTurma as $alunoTurma)
                                @if ($alunoTurma->turma)
                                    <option value="{{ $alunoTurma->idTurma }}">
                                        {{ $alunoTurma->turma->nomeTurma }} - {{ $alunoTurma->turma->anoLetivoTurma }}
                                    </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Botão para visualizar notas por turma e aluno -->
                <button class="btn btn-primary" id="visualizarNotas" @if ($pessoa->alunoTurma->isEmpty()) disabled @endif>
                    Visualizar Notas por Turma e Aluno
                </button>
                <div id="turmaNotasContent"></div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('visualizarNotas').addEventListener('click', function() {
        var turmaSelecionada = document.getElementById('nomeTurma').value;
        var pessoaId = '{{ $pessoa->idPessoa }}'; // Capturando o ID da Pessoa
        if (turmaSelecionada) {
            var url = "{{ route('notas.turma.aluno', ['idPessoa' => ':idPessoa', 'idTurma' => ':idTurma']) }}"
                .replace(':idPessoa', pessoaId)
                .replace(':idTurma', turmaSelecionada);

            window.location.href = url;
        }
    });
</script>
