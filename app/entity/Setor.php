<?php
namespace Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
#[Table(name: 'setor')]
class Setor
{
    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "integer")]
    private $numVagasTotal;

    #[Column(type: "integer")]
    private $numVagasOcupadas;

    #[ManyToOne(targetEntity: Estacionamento::class, inversedBy: "setores")]
    #[JoinColumn(name: "estacionamento_id", referencedColumnName: "id")]
    private $estacionamento;

    #[OneToMany(targetEntity: Vaga::class, mappedBy: "setor")]
    private $vagas;

    public function __construct()
    {
        $this->vagas = new ArrayCollection();
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }
}