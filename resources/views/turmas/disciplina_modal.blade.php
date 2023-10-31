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
                          @foreach ($turmas as $turma)
                            <tr>
                                <td class="align-middle text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" ></label>
                                    </div>
                                </td>
                                <td class="align-middle text-center">EFI01</td>
                                <td class="align-middle text-center">#</td>
                                <td class="align-middle text-center">60 Horas</td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    <!-- Exibir os botões de navegação das páginas -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            @if($turmas->previousPageUrl())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $turmas->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span> Anterior
                                    </a>
                                </li>
                            @endif
                    
                            @if($turmas->nextPageUrl())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $turmas->nextPageUrl() }}" aria-label="Next">
                                        Próximo <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar Disciplina</button>
            </div>
        </div>
    </div>
</div>
