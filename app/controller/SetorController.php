<?php
namespace Controller;

use Dao\SetorDao;
use Entities\Setor;

class SetorController extends Controller
{
    public static function listar($entityManager)
    {
        parent::isProtected();
        $dao = new SetorDao();
        $setores = $dao->read_all($entityManager);
        include("../app/view/module/setor/setorListar.php");
    }

    public static function form()
    {
        parent::isProtected();
        include("../app/view/module/setor/setorCadastrar.php");
    }

    public static function create($entityManager)
    {
        $dao = new SetorDao();
        if (isset($_POST["cadastrarSetor"])) {
            $setor = new Setor();
            $setor->numVagasTotal = (int) $_POST["numVagasTotal"];
            $setor->numVagasOcupadas = (int) $_POST["numVagasOcupadas"];
            $setor->estacionamento = $entityManager->find('Entities\Estacionamento', (int) $_POST["estacionamento_u"]);
            if ($dao->create($entityManager, $setor)) {
                header("location: /Setor");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        }
    }

    public static function edit($entityManager)
    {
        $dao = new SetorDao();
        if (isset($_POST["alterarSetor"])) {
            $setor = new Setor();
            $setor->id = (int) $_POST["id"];
            $setor->numVagasTotal = (int) $_POST["numVagasTotal"];
            $setor->numVagasOcupadas = (int) $_POST["numVagasOcupadas"];
            $setor->estacionamento = $entityManager->find('Entities\Estacionamento', (int) $_POST["estacionamento_u"]);
            if ($dao->update($entityManager, $setor)) {
                header("location: /Setor");
            } else {
                echo '<script type="text/javascript">alert("Erro em Alterar");</script>';
            }
        }
    }

    public static function delete($entityManager)
    {
        $dao = new SetorDao();
        if (isset($_REQUEST['id'])) {
            $setor = new Setor();
            $setor->id = (int) $_REQUEST['id'];
            if ($dao->delete($entityManager, $setor->id)) {
                header("Location: /Setor");
            } else {
                echo '<script type="text/javascript">alert("Erro em Deletar");</script>';
            }
        }
    }
}