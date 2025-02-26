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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="form-container">
        <h2><?= isset($ticket) ? 'Editar Ticket' : 'Cadastrar Ticket' ?></h2>
        <form action="<?= isset($ticket) ? '/ticket/form/edit' : '/ticket/form/create' ?>" method="POST">
            <?php if (isset($ticket)): ?>
                <input type="hidden" name="id" value="<?= $ticket->id ?>">
            <?php endif; ?>
            <div class="mb-3">
                <label for="codBarras" class="form-label">Código de Barras</label>
                <input type="number" class="form-control" id="codBarras" name="codBarras"
                    value="<?= isset($ticket) ? $ticket->codBarras : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="0" <?= isset($ticket) && $ticket->estado == 0 ? 'selected' : '' ?>>Inativo</option>
                    <option value="1" <?= isset($ticket) && $ticket->estado == 1 ? 'selected' : '' ?>>Ativo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="estacionamento" class="form-label">Estacionamento</label>
                <select class="form-control" id="estacionamento" name="estacionamento_id" required>
                    <option value="">Selecione um estacionamento</option>
                    <?php foreach ($estacionamentos as $estacionamento): ?>
                        <option value="<?= $estacionamento->id ?>" <?= isset($ticket) && $ticket->estacionamento->id === $estacionamento->id ? 'selected' : '' ?>>
                            <?= $estacionamento->nome ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" <?= isset($ticket) ? 'name="alterarTicket"' : 'name="cadastrarTicket"' ?>><?= isset($ticket) ? 'Salvar Alterações' : 'Cadastrar' ?></button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>