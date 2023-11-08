<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/imagens/layout/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/template.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4 bg-dark">
        <div class="container  d-flex flex-row">
            <button class="navbar-toggler d-flex " type="button" id="sidebarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mx-auto" href="#">
                <img src="/images/layout/logobranca2.png" alt="Logo" style="height: 50px;">
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="template-user" src="/images/usuarios/nekodev.JPG" alt="User" style="height: 30px;"> Daniel
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#" title="Alterar Dados, Senha, Foto de Perfil"><i class="bi bi-gear"></i> Configurações</a></li>
                        <li><a class="dropdown-item" href="#" title="Ajuda e Suporte"><i class="bi bi-question-circle"></i> Ajuda e Suporte</a></li>
                        <li><a class="dropdown-item" href="#" title="Sair da aplicação"><i class="bi bi-box-arrow-in-right"></i> Sair</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
    <!-- Sidebar -->
    <div>
        <nav id="sidebarMenu" class="bg-dark sidebar">
            <div class="position-sticky">

                <div class="list-group list-group-flush mx-3 mt-5">
                    <a href="{{ route('dashboard.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-tachometer-alt fa-fw me-3 text-white"></i><span
                            class="text-white">Dashboard</span>
                    </a>
                    <a href="{{ route('escola.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Config.
                            Escola</span>
                    </a>
                    <a href="{{ route('pessoas.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Cadastro de
                            Usuários</span>
                    </a>
                    <a href="{{ route('notas.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Cadastro de
                            Notas</span>
                    </a>
                    <a href="{{ route('turmas.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Cadastro de
                            Turmas</span>
                    </a>
                    <a href="{{ route('disciplinas.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Cadast. de
                            Disciplinas</span>
                    </a>
                    <a href="{{ route('aluno_turma.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Associar Aluno
                            a Turma</span>
                    </a>
                    <a href="{{ route('relatorios.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-lock fa-fw me-3 text-white"></i><span class="text-white">Relatórios</span>
                    </a>
                    <a href="{{ route('pesquisa.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple bg-dark">
                        <i class="fas fa-chart-line fa-fw me-3 text-white"></i><span class="text-white">Acadêmico</span>
                    </a>
                    @can('acessar-usuarios')
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple bg-dark">
                            <i class="fas fa-users fa-fw me-3 text-white"></i><span class="text-white">Usuários</span>
                        </a>
                    @endcan
                </div>
            </div>
        </nav>
    </div>

    <main class="ml-1">
        <main style="margin-top: 0;">
            <div class="container-fluid mt-4 mr-3">
                @yield('conteudo')
            </div>
        </main>
    </main>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/template.js"></script>
    <script>
        //menu lateral retrátil
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.content').classList.toggle('active');
        });
    </script>
    <script>
        $(document).ready(function() {
            // Aplicando máscara de CPF
            $('.cpf-mask').inputmask('999.999.999-99');

            // Aplicando máscara de CNPJ
            $('.cnpj-mask').inputmask('99.999.999/9999-99');

            // Aplicando máscara de telefone
            $('.telefone-mask').inputmask({
                mask: ['(99) 9999-9999', '(99) 99999-9999'],
                keepStatic: true,
                clearIncomplete: true
            });

        });
    </script>

</body>

</html>
