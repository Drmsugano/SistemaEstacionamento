<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estacionamento</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            margin-top: 20px;
        }
        .btn-add {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar (opcional, se já tiver uma navbar global) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
    <!-- Conteúdo da Tela de Estacionamento -->
    <div class="container">
        <h1>Estacionamentos</h1>
        <!-- Botão para Adicionar Novo Estacionamento -->
        <a href="/estacionamento/form" class="btn btn-primary btn-add">Adicionar Estacionamento</a>
        <!-- Tabela de Estacionamentos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data do Último Relatório</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estacionamentos as $estacionamento): ?>
                    <tr>
                        <td><?= $estacionamento->id ?></td>
                        <td><?= $estacionamento->nome ?></td>
                        <td><?= $estacionamento->dataUltimoRelatorio->format('d/m/Y') ?></td>
                        <td>
                            <a href="/estacionamento/form?id=<?= $estacionamento->id ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/estacionamento/delete?id=<?= $estacionamento->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este estacionamento?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS (opcional, apenas se precisar de funcionalidades JS do Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>