<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>SysEdu</title>
    <link rel="shortcut icon" href="/images/layout/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body id="login" class="bg-primary">
    <div class="container d-flex justify-content-center align-items-center h-100">

            <div class="card" id="admin-card">
                <div class="card-inner">
                    <img src="images/layout/familia.jpg" alt="Admin" class="img-fluid">
                    <h3 class="mt-4">Admin</h3>
                    <a href="{{ route('login.index') }}" class="btn btn-primary mt-4">Login</a>
                </div>
            </div>

            <div class="card" id="professor-card">
                <div class="card-inner">
                    <img src="images/layout/familia.jpg" alt="Professor" class="img-fluid">
                    <h3 class="mt-4">Professor</h3>
                    <a href="{{ route('login.index') }}" class="btn btn-primary mt-4">Login</a>
                </div>
            </div>

            <div class = "card" id="aluno-card">
                <div class="card-inner">
                    <img src="images/layout/familia.jpg" alt="Aluno" class="img-fluid">
                    <h3 class="mt-4">Aluno</h3>
                    <a href="{{ route('login.index') }}" class="btn btn-primary mt-4">Login</a>
                </div>
            </div>

            <div class="card" id="pai-card">
                <div class="card-inner">
                    <img src="images/layout/familia.jpg" alt="Responsavel" class="img-fluid">
                    <h3 class="mt-4">Responsavel</h3>
                    <a href="{{ route('login.index') }}" class="btn btn-primary mt-4">Login</a>
                </div>
            </div>

    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
