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
                <form>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th width="60">Escolha</th>
                                <th>Código</th>
                                <th>Nome da Disciplina</th>
                                <th>Carga Horária</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($turmasDisciplinas))
                                @foreach ($turmasDisciplinas as $turmaDisciplina)
                                    <tr>
                                        <!-- Use os nomes corretos dos atributos conforme definidos no seu modelo -->
                                        <td class="align-middle text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault"></label>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">{{ $turmaDisciplina->codigoDisciplina }}</td>
                                        <td class="align-middle text-center">{{ $turmaDisciplina->nomeDisciplina }}</td>
                                        <td class="align-middle text-center">{{ $turmaDisciplina->cargaHorariaDisciplina }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Nenhum dado disponível</td>
                                </tr>
                            @endif
                        </tbody>
                        
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar Disciplina</button>
            </div>
        </div>
    </div>
</div>
