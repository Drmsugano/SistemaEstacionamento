<?php
namespace Dao;

use Entity\Estacionamento;
use \PDOException;

class EstacionamentoDao extends Dao
{
    public function create($entityManager, $estacionamento)
    {
        $entityManager->persist($estacionamento);
        try {
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function read_all($entityManager)
    {
        $estacionamentoRepository = $entityManager->getRepository('Entity\\Estacionamento');
        $estacionamentos = $estacionamentoRepository->findAll();
        return $estacionamentos;
    }

    public function read($entityManager, $id)
    {
        $query = $entityManager->createQuery('SELECT e FROM Entity\Estacionamento e WHERE e.id = :id');
        $query->setParameter('id', $id);
        $estacionamento = $query->getResult();
        return $estacionamento;
    }

    public function update($entityManager, $estacionamentoAlt)
    {
        $estacionamento = $entityManager->find('Entity\\Estacionamento', $estacionamentoAlt->id);
        $estacionamento->nome = $estacionamentoAlt->nome;
        $estacionamento->dataUltimoRelatorio = new \DateTime($estacionamentoAlt->dataUltimoRelatorio);
        try {
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($entityManager, $id)
    {
        $estacionamento = $entityManager->find('Entity\\Estacionamento', $id);
        try {
            $entityManager->remove($estacionamento);
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}