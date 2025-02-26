<?php
namespace Controller;

use Dao\SetorDao;
use Entities\Setor;
use Dao\EstacionamentoDao;

class SetorController extends Controller
{
    public static function listar($entityManager)
    {
        parent::isProtected();
        $dao = new SetorDao();
        $setores = $dao->read_all($entityManager);
        include("../app/view/module/setor/setorListar.php");
    }

    public static function form($entityManager)
    {
        parent::isProtected(); // Verifica se o usuário está autenticado
        // Busca todos os estacionamentos para o dropdown
        $estacionamentoDao = new EstacionamentoDao();
        $estacionamentos = $estacionamentoDao->read_all($entityManager);
        // Verifica se é uma edição (passando o ID como parâmetro)
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            $setor = $entityManager->find('Entities\\Setor', $id);
        } else {
            $setor = null;
        }

        // Inclui a view do formulário
        include("../app/view/module/setor/setorForm.php");
    }

    public static function create($entityManager)
    {
        if (isset($_POST["cadastrarSetor"])) {
            $setor = new Setor();
            $setor->numVagasTotal = (int) $_POST["numVagasTotal"];
            $setor->numVagasOcupadas = (int) $_POST["numVagasOcupadas"];
            $setor->estacionamento = $entityManager->find('Entities\\Estacionamento', (int) $_POST["estacionamento_id"]);
    
            $dao = new SetorDao();
            if ($dao->create($entityManager, $setor)) {
                header("location: /setor");
            } else {
                echo '<script type="text/javascript">alert("Erro ao cadastrar setor");</script>';
            }
        }
    }
    
    public static function edit($entityManager)
    {
        if (isset($_POST["alterarSetor"])) {
            $setor = new Setor();
            $setor->id = (int) $_POST["id"];
            $setor->numVagasTotal = (int) $_POST["numVagasTotal"];
            $setor->numVagasOcupadas = (int) $_POST["numVagasOcupadas"];
            $setor->estacionamento = $entityManager->find('Entities\\Estacionamento', (int) $_POST["estacionamento_id"]);
    
            $dao = new SetorDao();
            if ($dao->update($entityManager, $setor)) {
                header("location: /setor");
            } else {
                echo '<script type="text/javascript">alert("Erro ao editar setor");</script>';
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
                header("Location: /setor");
            } else {
                echo '<script type="text/javascript">alert("Erro em Deletar");</script>';
            }
        }
    }
}