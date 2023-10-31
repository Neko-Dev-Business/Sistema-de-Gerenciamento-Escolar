<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SysEdu</title>
    <link rel="shortcut icon" href="/images/layout/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/icons/bootstrap-icons.css ">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body id="login"  class="bg-primary">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.5); height: 100% !important; margin: 0; padding: 0;">
        <div class="col-xl-3 bg-white p-5 rounded-3 shadow position-absolute top-50 start-50 translate-middle form-container ">
            <img src="/images/layout/Logo.png" alt="sysedu" height="150" class="d-block mx-auto mb-4">

            {{-- ERRO NA SESSION! --}}
           {{-- @if (Session::get('erro'))
            <div class="alert alert-danger text-center p-2">{{ Session::get('erro') }}</div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning text-center p-2">{{ $error }}</div>
                @endforeach
            @endif --}}

            <form class="row g-4 mb-3" action="{{ route('login.auth') }}" method="POST">
                @csrf
                <div class="col-12 d-grid">
                    <label for="email" class="form-label fs-5 fs-5">E-mail</label>
                    <input type="email" class="bg-light form-control form-control-lg" id="email" name="email">
                </div>
                <div class="col-12 d-grid">
                    <label for="password" class="form-label fs-5 fs-5">Senha</label>
                    <input type="password" class="bg-light form-control form-control-lg" id="password" name="password">
                </div>
                <div class="col-12 d-grid">
                    <button type="submit" class="template-btn btn btn-lg btn-primary">Entrar</button>
                </div>
                <div class="col-12 d-grid">
                    <a href="https://wa.me/5575988358406" target="_blank" class="btn  mt-2">Esqueci minha senha</a>
                </div>
            </form>

            <div class="text-center fixed-bottom mb-2 mt-3 template-fnt-alt" style="font-size: 1em;">
                &copy; Copyright - SysEdu by <br /> Gabriel e Daniel.
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('load', function () {
            document.querySelector('.form-container').classList.add('active');
        });
    </script>
</body>
</html>
