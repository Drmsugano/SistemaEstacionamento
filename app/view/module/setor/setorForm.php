<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Setor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-submit {
            width: 100%;
            background-color: #007bff;
            color: #fff;
        }
        .btn-submit:hover {
            background-color: #0056b3;
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
    <!-- Formulário de Cadastro de Setor -->
    <div class="form-container">
        <h2><?= isset($setor) ? 'Editar Setor' : 'Cadastrar Setor' ?></h2>
        <form action="<?= isset($setor) ? '/setor/form/edit' : '/setor/form/create' ?>" method="POST">
            <!-- Campo Oculto para ID (usado apenas em edição) -->
            <?php if (isset($setor)): ?>
                <input type="hidden" name="id" value="<?= $setor->id ?>">
            <?php endif; ?>
            <!-- Campo Número Total de Vagas -->
            <div class="mb-3">
                <label for="numVagasTotal" class="form-label">Número Total de Vagas</label>
                <input type="number" class="form-control" id="numVagasTotal" name="numVagasTotal" value="<?= isset($setor) ? $setor->numVagasTotal : '' ?>" required>
            </div>
            <!-- Campo Número de Vagas Ocupadas -->
            <div class="mb-3">
                <label for="numVagasOcupadas" class="form-label">Número de Vagas Ocupadas</label>
                <input type="number" class="form-control" id="numVagasOcupadas" name="numVagasOcupadas" value="<?= isset($setor) ? $setor->numVagasOcupadas : '' ?>" required>
            </div>
            <!-- Campo Estacionamento -->
            <div class="mb-3">
                <label for="estacionamento" class="form-label">Estacionamento</label>
                <select class="form-control" id="estacionamento" name="estacionamento_id" required>
                    <option value="">Selecione um estacionamento</option>
                    <?php foreach ($estacionamentos as $estacionamento): ?>
                        <option value="<?= $estacionamento->id ?>" <?= isset($setor) && $setor->estacionamento->id === $estacionamento->id ? 'selected' : '' ?>>
                            <?= $estacionamento->nome ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Botão de Envio -->
            <button type="submit" class="btn btn-submit" <?= isset($setor) ? 'name="alterarSetor"' : 'name="cadastrarSetor"' ?>><?= isset($setor) ? 'Salvar Alterações' : 'Cadastrar' ?></button>
        </form>
    </div>
    <!-- Bootstrap JS (opcional, apenas se precisar de funcionalidades JS do Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>