<!-- Modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalDisciplina">
    <i class="bi bi-plus" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
</button>

<!-- Modal de adicionar disciplinas -->
<div class="modal fade" id="modalDisciplina" tabindex="-1" aria-labelledby="modalDisciplinaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDisciplinaLabel">Adicionar Disciplina</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário para adicionar disciplina -->
                <form>
                    <!-- Campos do formulário para adicionar disciplina -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault" >
                            Teste
                        </label>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar Disciplina</button>
            </div>
        </div>
    </div>
</div>
