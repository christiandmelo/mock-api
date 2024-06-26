<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MockService;
use App\DTO\MockDTO;

class MockController extends AbstractController
{
    private $mockService;

    public function __construct(MockService $mockService)
    {
        $this->mockService = $mockService;
    }

    /**
     * @Route("/mock", methods={"POST"})
     */
    public function createMock(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $mockDTO = new MockDTO($data['name']);
        $this->mockService->createMock($mockDTO);

        return new Response('Mock created successfully', Response::HTTP_CREATED);
    }

    /**
     * @Route("/mock/{id}", methods={"PUT"})
     */
    public function updateMock(int $id, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $mockDTO = new MockDTO($data['name']);
        $this->mockService->updateMock($id, $mockDTO);

        return new Response('Mock updated successfully', Response::HTTP_OK);
    }

    /**
     * @Route("/mock/{id}", methods={"DELETE"})
     */
    public function deleteMock(int $id): Response
    {
        $this->mockService->deleteMock($id);

        return new Response('Mock deleted successfully', Response::HTTP_NO_CONTENT);
    }
}
