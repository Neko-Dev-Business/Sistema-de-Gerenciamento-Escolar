<!-- Modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalDisciplina">
    <i class="bi bi-plus" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
</button>

<!-- Modal de adicionar disciplinas -->
<div class="modal fade" id="modalDisciplina" tabindex="-1" aria-labelledby="modalDisciplinaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDisciplinaLabel">Adicionar Disciplina</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('turmas.adicionarDisciplinas', $turma->idTurma) }}">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-striped text-center">
                            <!-- Tabela das disciplinas -->
                            <thead class="table-dark">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Carga Horária</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($disciplinas as $disciplina)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="disciplinas[]" value="{{ $disciplina->idDisciplina }}" id="disciplina_{{ $disciplina->idDisciplina }}">
                                                <label class="form-check-label" for="disciplina_{{ $disciplina->idDisciplina }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $disciplina->codigoDisciplina }}</td>
                                        <td>{{ $disciplina->nomeDisciplina }}</td>
                                        <td>{{ $disciplina->cargaHorariaDisciplina }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Adicionar Disciplinas</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
