<?php

use Controller\EstacionamentoController;
use Controller\SetorController;
use Controller\VagaController;
use Controller\TicketController;
use Controller\LoginController;
use Controller\HomeController;

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url) {
    // Autenticação
    case '/login':
        LoginController::login();
        break;

    case '/autenticar':
        LoginController::autenticar($entityManager);
        break;

    case '/sair':
        LoginController::sair();
        break;

    // Página Home
    case '/Home':
        HomeController::index();
        break;

    // Estacionamento
    case '/estacionamento':
        EstacionamentoController::listar($entityManager);
        break;

    case "/estacionamento/form":
        EstacionamentoController::form();
        break;

    case "/estacionamento/form/create":
        EstacionamentoController::create($entityManager);
        break;

    case "/estacionamento/form/edit":
        EstacionamentoController::edit($entityManager);
        break;

    case "/estacionamento/delete":
        EstacionamentoController::delete($entityManager);
        break;

    // Setor
    case '/setor':
        SetorController::listar($entityManager);
        break;

    case "/setor/form":
        SetorController::form();
        break;

    case "/setor/form/create":
        SetorController::create($entityManager);
        break;

    case "/setor/form/edit":
        SetorController::edit($entityManager);
        break;

    case "/setor/delete":
        SetorController::delete($entityManager);
        break;

    // Vaga
    case '/vaga':
        VagaController::listar($entityManager);
        break;

    case "/vaga/form":
        VagaController::form();
        break;

    case "/vaga/form/create":
        VagaController::create($entityManager);
        break;

    case "/vaga/form/edit":
        VagaController::edit($entityManager);
        break;

    case "/vaga/delete":
        VagaController::delete($entityManager);
        break;

    // Ticket
    case '/ticket':
        TicketController::listar($entityManager);
        break;

    case "/ticket/form":
        TicketController::form();
        break;

    case "/ticket/form/create":
        TicketController::create($entityManager);
        break;

    case "/ticket/form/edit":
        TicketController::edit($entityManager);
        break;

    case "/ticket/delete":
        TicketController::delete($entityManager);
        break;

    // Rota padrão para erro 404
    default:
        echo "Erro 404";
        break;
}