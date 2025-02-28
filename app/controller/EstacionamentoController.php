<?php
namespace Controller;

use Dao\EstacionamentoDao;
use Entities\Estacionamento;

class EstacionamentoController extends Controller
{
    public static function listar($entityManager)
    {
        parent::isProtected();
        $dao = new EstacionamentoDao();
        $estacionamentos = $dao->read_all($entityManager);
        include("../app/view/module/estacionamento/estacionamentoListar.php");
    }

    public static function form($entityManager)
    {
        parent::isProtected();
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            $estacionamento = $entityManager->find('Entities\\Estacionamento', $id);
        } else {
            $estacionamento = null;
        }
        include("../app/view/module/estacionamento/estacionamentoForm.php");
    }

    public static function create($entityManager)
    {
        $dao = new EstacionamentoDao();
        if (isset($_POST["cadastrarEstacionamento"])) {
            $estacionamento = new Estacionamento();
            $estacionamento->nome = $_POST["nome"];
            $estacionamento->dataUltimoRelatorio = new \DateTime($_POST['dataUltimoRelatorio']);
            if ($dao->create($entityManager, $estacionamento)) {
                header("location: /estacionamento");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        }
    }

    public static function edit($entityManager)
    {
        $dao = new EstacionamentoDao();
        if (isset($_POST["alterarEstacionamento"])) {
            $estacionamento = new Estacionamento();
            $estacionamento->id = (int) $_POST["id"];
            $estacionamento->nome = $_POST["nome"];
            $estacionamento->dataUltimoRelatorio = new \DateTime($_POST['dataUltimoRelatorio']);
            if ($dao->update($entityManager, $estacionamento)) {
                header("location: /estacionamento");
            } else {
                echo '<script type="text/javascript">alert("Erro em Alterar");</script>';
            }
        }
    }

    public static function delete($entityManager)
    {
        $dao = new EstacionamentoDao();
        if (isset($_REQUEST['id'])) {
            $estacionamento = new Estacionamento();
            $estacionamento->id = (int) $_REQUEST['id'];
            if ($dao->delete($entityManager, $estacionamento->id)) {
                header("Location: /estacionamento");
            } else {
                echo '<script type="text/javascript">alert("Erro em Deletar");</script>';
            }
        }
    }
}