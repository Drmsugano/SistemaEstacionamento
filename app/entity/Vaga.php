<?php
namespace Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'vaga')]
class Vaga
{
    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "integer")]
    private $estado;

    #[Column(type: "integer")]
    private $tempoOcupada;

    #[Column(type: "integer")]
    private $vezesOcupada;

    #[ManyToOne(targetEntity: Setor::class, inversedBy: "vagas")]
    #[JoinColumn(name: "setor_id", referencedColumnName: "id")]
    private $setor;

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }
}