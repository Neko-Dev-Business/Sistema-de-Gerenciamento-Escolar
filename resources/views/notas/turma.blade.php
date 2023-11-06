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
                      <option value=""></option>
                      @foreach ($pessoa->turmas as $turma)
                          <option value="{{ $turma->idTurma }}">{{ $turma->nomeTurma }} - {{ $turma->anoLetivoTurma }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <a href="{{ route('notas.turma', $pessoa->idPessoa) }}" class="btn btn-primary">Confirmar</a>
          </div>
      </div>
  </div>
</div>
