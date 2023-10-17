<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/imagens/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/template.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="{{ route('dashboard.index') }}" class="navbar-brand">
            <h4 class="text-bold text-white">#</h4>
        </a>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="#" alt="User Photo" class="rounded-circle" width="38" height="38">
                        Daniel
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person"></i> Meu Perfil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear"></i> Configurações da Conta
                        </a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i> Sair
                        </a>
                        <form id="logout-form" action="#" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<!-- Sidebar -->
<div>
    <nav id="sidebarMenu" class="bg-dark sidebar">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-5">
                <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action py-2 ripple bg-dark">
                    <i class="fas fa-tachometer-alt fa-fw me-3 text-white"></i><span class="text-white">Dashboard</span>
                </a>
                <a href="{{ route('pessoas.index') }}" class="list-group-item list-group-item-action py-2 ripple bg-dark">
                    <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Cadastro Pessoas</span>
                </a>
                <a href="{{ route('alunos.index') }}" class="list-group-item list-group-item-action py-2 ripple bg-dark">
                    <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Matrícula de Alunos</span>
                </a>
                <a href="{{ route('professores.index') }}" class="list-group-item list-group-item-action py-2 ripple bg-dark">
                    <i class="fas fa-chart-area fa-fw me-3 text-white"></i> <span class="text-white">Contratação de Professores</span>
                </a>
                <a href="{{ route('relatorios.index') }}" class="list-group-item list-group-item-action py-2 ripple bg-dark">
                    <i class="fas fa-lock fa-fw me-3 text-white"></i><span class="text-white">Relatórios</span>
                </a>
                <a href="{{ route('pesquisa.index') }}" class="list-group-item list-group-item-action py-2 ripple bg-dark">
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
            <div class="container-fluid mt-4 ml-3">
                @yield('conteudo')
            </div>
        </main>
    </main>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/template.js"></script>
    {{-- <script scr="{{ asset('js/template.js') }}"></script> --}}
</body>
</html>
