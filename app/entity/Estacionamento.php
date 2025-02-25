<?php
namespace Entities;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
#[Table(name: 'estacionamento')]
class Estacionamento
{
    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "string", length: 50)]
    private $nome;

    #[Column(type: "date")]
    private $dataUltimoRelatorio;

    #[OneToMany(targetEntity: Setor::class, mappedBy: "estacionamento")]
    private $setores;

    public function __construct()
    {
        $this->setores = new ArrayCollection();
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