<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistema de Estacionamento</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
            background-color: #0056b3;
            border-radius: 5px;
        }
        .welcome-message {
            text-align: center;
            margin-top: 50px;
            font-size: 2rem;
            color: #333;
        }
        .module-links {
            margin-top: 30px;
            text-align: center;
        }
        .module-links a {
            margin: 10px;
            padding: 15px 30px;
            font-size: 1.2rem;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .module-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Sistema de Estacionamento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/estacionamento">Estacionamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/setor">Setor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vaga">Vaga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ticket">Ticket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sair">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Conteúdo da Homepage -->
    <div class="container">
        <div class="welcome-message">
            <h1>Bem-vindo <?= $_SESSION['usuario_logado']['nome'] ?> ao Sistema de Estacionamento</h1>
            <p>Gerencie estacionamentos, setores, vagas e tickets de forma eficiente.</p>
        </div>
        <!-- Links para os Módulos -->
        <div class="module-links">
            <a href="/estacionamento" class="btn-module">Estacionamento</a>
            <a href="/setor" class="btn-module">Setor</a>
            <a href="/vaga" class="btn-module">Vaga</a>
            <a href="/ticket" class="btn-module">Ticket</a>
        </div>
    </div>
    <!-- Bootstrap JS (opcional, apenas se precisar de funcionalidades JS do Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>