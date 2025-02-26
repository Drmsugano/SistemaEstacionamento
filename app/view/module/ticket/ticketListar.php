<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Tickets</title>
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
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Sistema de Estacionamento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/estacionamento">Estacionamento</a></li>
                    <li class="nav-item"><a class="nav-link" href="/setor">Setor</a></li>
                    <li class="nav-item"><a class="nav-link" href="/vaga">Vaga</a></li>
                    <li class="nav-item"><a class="nav-link" href="/ticket">Ticket</a></li>
                    <li class="nav-item"><a class="nav-link" href="/sair">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Tickets</h1>
        <a href="/ticket/form" class="btn btn-primary btn-add">Adicionar Ticket</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código de Barras</th>
                    <th>Estado</th>
                    <th>Estacionamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?= $ticket->id ?></td>
                        <td><?= $ticket->codBarras ?></td>
                        <td><?= $ticket->estado ? 'Ativo' : 'Inativo' ?></td>
                        <td><?= $ticket->estacionamento->nome ?></td>
                        <td>
                            <a href="/ticket/form?id=<?= $ticket->id ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/ticket/delete?id=<?= $ticket->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este ticket?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
