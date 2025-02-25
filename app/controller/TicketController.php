<?php
namespace Controller;

use Dao\TicketDao;
use Entities\Ticket;

class TicketController extends Controller
{
    public static function listar($entityManager)
    {
        parent::isProtected();
        $dao = new TicketDao();
        $tickets = $dao->read_all($entityManager);
        include("../app/view/module/ticket/ticketListar.php");
    }

    public static function form()
    {
        parent::isProtected();
        include("../app/view/module/ticket/ticketCadastrar.php");
    }

    public static function create($entityManager)
    {
        $dao = new TicketDao();
        if (isset($_POST["cadastrarTicket"])) {
            $ticket = new Ticket();
            $ticket->codBarras = (int) $_POST["codBarras"];
            $ticket->estado = (int) $_POST["estado"];
            $ticket->estacionamento = $entityManager->find('Entities\Estacionamento', (int) $_POST["estacionamento_u"]);
            if ($dao->create($entityManager, $ticket)) {
                header("location: /Ticket");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        }
    }

    public static function edit($entityManager)
    {
        $dao = new TicketDao();
        if (isset($_POST["alterarTicket"])) {
            $ticket = new Ticket();
            $ticket->id = (int) $_POST["id"];
            $ticket->codBarras = (int) $_POST["codBarras"];
            $ticket->estado = (int) $_POST["estado"];
            $ticket->estacionamento = $entityManager->find('Entities\Estacionamento', (int) $_POST["estacionamento_id"]);
            if ($dao->update($entityManager, $ticket)) {
                header("location: /Ticket");
            } else {
                echo '<script type="text/javascript">alert("Erro em Alterar");</script>';
            }
        }
    }

    public static function delete($entityManager)
    {
        $dao = new TicketDao();
        if (isset($_REQUEST['id'])) {
            $ticket = new Ticket();
            $ticket->id = (int) $_REQUEST['id'];
            if ($dao->delete($entityManager, $ticket->id)) {
                header("Location: /Ticket");
            } else {
                echo '<script type="text/javascript">alert("Erro em Deletar");</script>';
            }
        }
    }
}