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


    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">

        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Minhas Notas</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-lock fa-fw me-3"></i><span>Avaliações</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-chart-line fa-fw me-3"></i><span>Horário</span></a>

        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>

        </button>
        <a class="navbar-brand " href="{{ route('dashboard.index') }}">
          <img src="imagens/logo.png" height="50" alt="SysEdu"
            loading="lazy" />
        </a>

          @can('acessar-usuarios')
                <li class="nav-item px-3">
                  <a class="nav-link text-white" href="#"><i id="main" class="bi bi-key color-white"></i>Usuários</a>
                </li>
              @endcan
              <li class="nav-item px-3 dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">{{--  --}}<img class="template-user" src="/storage/usuarios/{{ auth()->user()->foto}}" alt="{{ auth()->user()->name }}" />{{ auth()->user()->name }}</a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#" class="dropdown-item" title="Alterar Dados, Senha, Foto de Perfil"><i class="bi bi-gear"></i> Configurações</a></li>
                    <li><a href="#" class="dropdown-item" title="Ajuda e Suporte"><i class="bi bi-question-circle"></i> Ajuda e Suporte</a></li>
                    <li><a href="#" class="dropdown-item" title="Sair da aplicação"><i class="bi bi-box-arrow-in-right"></i> Sair</a></li>
                </ul>

          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
  <main style="margin-top: 58px;">
    <div class="container pt-4"></div>
  </main>
  <!--Main layout-->

      <div class="container mb-3 p-4 bg-white shadow h-100 position-relative">
        @yield('conteudo')

      </div>

      </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/template.js"></script>
    {{-- <script scr="{{ asset('js/template.js') }}"></script> --}}
</body>
</html>
