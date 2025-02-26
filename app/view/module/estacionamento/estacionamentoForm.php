<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Estacionamento</title>
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
    <!-- Formulário de Cadastro de Estacionamento -->
    <div class="form-container">
        <h2><?= isset($estacionamento) ? 'Editar Estacionamento' : 'Cadastrar Estacionamento' ?></h2>
        <form action="<?= isset($estacionamento) ? '/estacionamento/form/edit' : '/estacionamento/form/create' ?>" method="POST">
            <!-- Campo Oculto para ID (usado apenas em edição) -->
            <?php if (isset($estacionamento)): ?>
                <input type="hidden" name="id" value="<?= $estacionamento->id ?>">
            <?php endif; ?>
            <!-- Campo Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Estacionamento</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($estacionamento) ? $estacionamento->nome : '' ?>" required>
            </div>
            <!-- Campo Data do Último Relatório -->
            <div class="mb-3">
                <label for="dataUltimoRelatorio" class="form-label">Data do Último Relatório</label>
                <input type="date" class="form-control" id="dataUltimoRelatorio" name="dataUltimoRelatorio" value="<?= isset($estacionamento) ? $estacionamento->dataUltimoRelatorio->format('Y-m-d') : '' ?>" required>
            </div>
            <!-- Botão de Envio -->
            <button type="submit" class="btn btn-submit" <?= isset($estacionamento) ?  'name="alterarEstacionamento"' : 'name="cadastrarEstacionamento"' ?> ><?= isset($estacionamento) ? 'Salvar Alterações' : 'Cadastrar' ?></button>
            </form>
    </div>
    <!-- Bootstrap JS (opcional, apenas se precisar de funcionalidades JS do Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>