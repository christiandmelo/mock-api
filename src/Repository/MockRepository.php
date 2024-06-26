<?php

namespace App\Repository;

use App\Entity\Mock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mock::class);
    }

    // Adicione métodos personalizados aqui, se necessário
}
