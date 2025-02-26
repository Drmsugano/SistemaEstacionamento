<?php
namespace Dao;

use Entity\Vaga;
use \PDOException;

class VagaDao extends Dao
{
    public function create($entityManager, $vaga)
    {
        $entityManager->persist($vaga);
        try {
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function read_all($entityManager)
    {
        $vagaRepository = $entityManager->getRepository('Entities\\Vaga');
        $vagas = $vagaRepository->findAll();
        return $vagas;
    }

    public function read($entityManager, $id)
    {
        $query = $entityManager->createQuery('SELECT v FROM Entities\Vaga v WHERE v.id = :id');
        $query->setParameter('id', $id);
        $vaga = $query->getResult();
        return $vaga;
    }

    public function update($entityManager, $vagaAlt)
    {
        $vaga = $entityManager->find('Entities\\Vaga', $vagaAlt->id);
        $vaga->estado = $vagaAlt->estado;
        $vaga->tempoOcupada = $vagaAlt->tempoOcupada;
        $vaga->vezesOcupada = $vagaAlt->vezesOcupada;
        $vaga->setor = $vagaAlt->setor;
        try {
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($entityManager, $id)
    {
        $vaga = $entityManager->find('Entities\\Vaga', $id);
        try {
            $entityManager->remove($vaga);
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}