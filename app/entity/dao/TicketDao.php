<?php
namespace Dao;

use Entity\Ticket;
use \PDOException;

class TicketDao extends Dao
{
    public function create($entityManager, $ticket)
    {
        $entityManager->persist($ticket);
        try {
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function read_all($entityManager)
    {
        $ticketRepository = $entityManager->getRepository('Entities\\Ticket');
        $tickets = $ticketRepository->findAll();
        return $tickets;
    }

    public function read($entityManager, $id)
    {
        $query = $entityManager->createQuery('SELECT t FROM Entities\Ticket t WHERE t.id = :id');
        $query->setParameter('id', $id);
        $ticket = $query->getResult();
        return $ticket;
    }

    public function update($entityManager, $ticketAlt)
    {
        $ticket = $entityManager->find('Entities\\Ticket', $ticketAlt->id);
        $ticket->codBarras = $ticketAlt->codBarras;
        $ticket->estado = $ticketAlt->estado;
        $ticket->estacionamento = $ticketAlt->estacionamento;
        try {
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($entityManager, $id)
    {
        $ticket = $entityManager->find('Entities\\Ticket', $id);
        try {
            $entityManager->remove($ticket);
            $entityManager->flush();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}