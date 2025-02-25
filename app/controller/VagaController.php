<?php
namespace Controller;

use Dao\VagaDao;
use Entities\Vaga;

class VagaController extends Controller
{
    public static function listar($entityManager)
    {
        parent::isProtected();
        $dao = new VagaDao();
        $vagas = $dao->read_all($entityManager);
        include("../app/view/module/vaga/vagaListar.php");
    }

    public static function form()
    {
        parent::isProtected();
        include("../app/view/module/vaga/vagaCadastrar.php");
    }

    public static function create($entityManager)
    {
        $dao = new VagaDao();
        if (isset($_POST["cadastrarVaga"])) {
            $vaga = new Vaga();
            $vaga->estado = (int) $_POST["estado"];
            $vaga->tempoOcupada = (int) $_POST["tempoOcupada"];
            $vaga->vezesOcupada = (int) $_POST["vezesOcupada"];
            $vaga->setor = $entityManager->find('Entities\Setor', (int) $_POST["setor_u"]);
            if ($dao->create($entityManager, $vaga)) {
                header("location: /Vaga");
            } else {
                echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
            }
        }
    }

    public static function edit($entityManager)
    {
        $dao = new VagaDao();
        if (isset($_POST["alterarVaga"])) {
            $vaga = new Vaga();
            $vaga->id = (int) $_POST["id"];
            $vaga->estado = (int) $_POST["estado"];
            $vaga->tempoOcupada = (int) $_POST["tempoOcupada"];
            $vaga->vezesOcupada = (int) $_POST["vezesOcupada"];
            $vaga->setor = $entityManager->find('Entities\Setor', (int) $_POST["setor_u"]);
            if ($dao->update($entityManager, $vaga)) {
                header("location: /Vaga");
            } else {
                echo '<script type="text/javascript">alert("Erro em Alterar");</script>';
            }
        }
    }

    public static function delete($entityManager)
    {
        $dao = new VagaDao();
        if (isset($_REQUEST['id'])) {
            $vaga = new Vaga();
            $vaga->id = (int) $_REQUEST['id'];
            if ($dao->delete($entityManager, $vaga->id)) {
                header("Location: /Vaga");
            } else {
                echo '<script type="text/javascript">alert("Erro em Deletar");</script>';
            }
        }
    }
}