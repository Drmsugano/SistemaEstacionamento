<?php
namespace Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'ticket')]
class Ticket
{
    #[Id]
    #[Column(type: "integer"), GeneratedValue]
    private $id;

    #[Column(type: "integer")]
    private $codBarras;

    #[Column(type: "integer")]
    private $estado;

    #[ManyToOne(targetEntity: Estacionamento::class, inversedBy: "tickets")]
    #[JoinColumn(name: "estacionamento_id", referencedColumnName: "id")]
    private $estacionamento;

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }
}