<!-- Modal para exibir as disciplinas da turma -->
<div class="modal fade" id="modalTurmaDisciplinas_{{ $turma->idTurma }}" tabindex="-1" role="dialog" aria-labelledby="modalTurmaDisciplinasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Utilizando modal-lg para um modal grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="modalTurmaDisciplinasLabel">Disciplinas da Turma: {{ $turma->nomeTurma }} - {{ $turma->anoLetivoTurma }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive"> <!-- Utilizando table-responsive para permitir rolagem na tabela -->
                    <table class="table table-striped text-center"> <!-- Centralizando o conteúdo -->
                        <thead class="table-dark">
                            <tr>
                                <th width="60">#</th>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Carga Horária</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turma->disciplinas as $disciplina)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault"></label>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
