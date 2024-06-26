<?php

namespace App\Service;

use App\Repository\MockRepository;
use App\DTO\MockDTO;
use App\Entity\Mock;
use App\Exception\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;

class MockService
{
    private $mockRepository;
    private $entityManager;

    public function __construct(MockRepository $mockRepository, EntityManagerInterface $entityManager)
    {
        $this->mockRepository = $mockRepository;
        $this->entityManager = $entityManager;
    }

    public function createMock(MockDTO $mockDTO): void
    {
        $mock = new Mock();
        $mock->setName($mockDTO->getName());

        $this->entityManager->persist($mock);
        $this->entityManager->flush();
    }

    public function updateMock(int $id, MockDTO $mockDTO): void
    {
        $mock = $this->mockRepository->find($id);

        if (!$mock) {
            throw new NotFoundException('Mock not found');
        }

        $mock->setName($mockDTO->getName());

        $this->entityManager->flush();
    }

    public function deleteMock(int $id): void
    {
        $mock = $this->mockRepository->find($id);

        if (!$mock) {
            throw new NotFoundException('Mock not found');
        }

        $this->entityManager->remove($mock);
        $this->entityManager->flush();
    }
}
