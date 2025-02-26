<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Vagas</title>
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

    <!-- Conteúdo da Tela de Listagem de Vagas -->
    <div class="container">
        <h1>Vagas</h1>

        <!-- Botão para Adicionar Nova Vaga -->
        <a href="/vaga/form" class="btn btn-primary btn-add">Adicionar Vaga</a>

        <!-- Tabela de Vagas -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Tempo Ocupada</th>
                    <th>Vezes Ocupada</th>
                    <th>Setor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vagas as $vaga): ?>
                    <tr>
                        <td><?= $vaga->id ?></td>
                        <td><?= $vaga->estado == 0 ? "Livre" : "Ocupado" ?></td>
                        <td><?= $vaga->tempoOcupada ?></td>
                        <td><?= $vaga->vezesOcupada ?></td>
                        <td><?= $vaga->setor->id ?></td>
                        <td>
                            <a href="/vaga/form?id=<?= $vaga->id ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/vaga/delete?id=<?= $vaga->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta vaga?')">Excluir</a>
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