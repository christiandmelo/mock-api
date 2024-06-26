<?php

namespace App\Service;

use App\Repository\RequestRepository;
use App\DTO\RequestDTO;
use App\Entity\Request;
use App\Exception\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;

class RequestService
{
    private $requestRepository;
    private $entityManager;

    public function __construct(RequestRepository $requestRepository, EntityManagerInterface $entityManager)
    {
        $this->requestRepository = $requestRepository;
        $this->entityManager = $entityManager;
    }

    public function createRequest(RequestDTO $requestDTO): void
    {
        $request = new Request();
        $request->setMockId($requestDTO->getMockId());
        $request->setName($requestDTO->getName());
        $request->setType($requestDTO->getType());
        $request->setUrl($requestDTO->getUrl());
        $request->setResponseCode($requestDTO->getResponseCode());
        $request->setResponseType($requestDTO->getResponseType());
        $request->setResponseBody($requestDTO->getResponseBody());

        $this->entityManager->persist($request);
        $this->entityManager->flush();
    }

    public function updateRequest(int $id, RequestDTO $requestDTO): void
    {
        $request = $this->requestRepository->find($id);

        if (!$request) {
            throw new NotFoundException('Request not found');
        }

        $request->setMockId($requestDTO->getMockId());
        $request->setName($requestDTO->getName());
        $request->setType($requestDTO->getType());
        $request->setUrl($requestDTO->getUrl());
        $request->setResponseCode($requestDTO->getResponseCode());
        $request->setResponseType($requestDTO->getResponseType());
        $request->setResponseBody($requestDTO->getResponseBody());

        $this->entityManager->flush();
    }

    public function deleteRequest(int $id): void
    {
        $request = $this->requestRepository->find($id);

        if (!$request) {
            throw new NotFoundException('Request not found');
        }

        $this->entityManager->remove($request);
        $this->entityManager->flush();
    }
}
