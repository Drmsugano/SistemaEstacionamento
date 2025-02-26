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

    <!-- Navbar (opcional, se já tiver uma navbar global) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Sistema de Estacionamento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="container">
        <div class="form-container">
            <h2><?= isset($vaga) ? 'Editar Vaga' : 'Cadastrar Vaga' ?></h2>
            <form action="<?= isset($vaga) ? '/vaga/form/edit' : '/vaga/form/create' ?>" method="POST">
                <?php if (isset($vaga)): ?>
                    <input type="hidden" name="id" value="<?= $vaga->id ?>">
                <?php endif; ?>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="0" <?= isset($vaga) && $vaga->estado == 0 ? 'selected' : '' ?>>Livre</option>
                        <option value="1" <?= isset($vaga) && $vaga->estado == 1 ? 'selected' : '' ?>>Ocupada</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tempoOcupada" class="form-label">Tempo Ocupada</label>
                    <input type="number" class="form-control" id="tempoOcupada" name="tempoOcupada"
                        value="<?= isset($vaga) ? $vaga->tempoOcupada : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="vezesOcupada" class="form-label">Vezes Ocupada</label>
                    <input type="number" class="form-control" id="vezesOcupada" name="vezesOcupada"
                        value="<?= isset($vaga) ? $vaga->vezesOcupada : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="setor" class="form-label">Setor</label>
                    <select class="form-control" id="setor" name="setor_id" required>
                        <option value="">Selecione um setor</option>
                        <?php foreach ($setores as $setor): ?>
                            <option value="<?= $setor->id ?>" <?= isset($vaga) && $vaga->setor->id === $setor->id ? 'selected' : '' ?>>
                                <?= $setor->id ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" <?= isset($vaga) ? 'name="alterarVaga"' : 'name="cadastrarVaga"' ?>><?= isset($vaga) ? 'Salvar Alterações' : 'Cadastrar' ?></button>
            </form>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>