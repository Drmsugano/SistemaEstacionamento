<?php
namespace Dao;

use Entity\Setor;
use \PDOException;

class SetorDao extends Dao
{
    public function create($entityManager, $setor)
    {
        $entityManager->persist($setor);
        try {
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function read_all($entityManager)
    {
        $setorRepository = $entityManager->getRepository('Entities\\Setor');
        $setores = $setorRepository->findAll();
        return $setores;
    }

    public function read($entityManager, $id)
    {
        $query = $entityManager->createQuery('SELECT s FROM Entities\Setor s WHERE s.id = :id');
        $query->setParameter('id', $id);
        $setor = $query->getResult();
        return $setor;
    }

    public function update($entityManager, $setorAlt)
    {
        $setor = $entityManager->find('Entities\\Setor', $setorAlt->id);
        $setor->numVagasTotal = $setorAlt->numVagasTotal;
        $setor->numVagasOcupadas = $setorAlt->numVagasOcupadas;
        $setor->estacionamento = $setorAlt->estacionamento;
        try {
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($entityManager, $id)
    {
        $setor = $entityManager->find('Entities\\Setor', $id);
        try {
            $entityManager->remove($setor);
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}