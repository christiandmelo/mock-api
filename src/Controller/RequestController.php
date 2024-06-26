<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\RequestService;
use App\DTO\RequestDTO;

class RequestController extends AbstractController
{
    private $requestService;

    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    /**
     * @Route("/request", methods={"POST"})
     */
    public function createRequest(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $requestDTO = new RequestDTO(
            $data['mockId'],
            $data['name'],
            $data['type'],
            $data['url'],
            $data['responseCode'],
            $data['responseType'],
            $data['responseBody']
        );
        $this->requestService->createRequest($requestDTO);

        return new Response('Request created successfully', Response::HTTP_CREATED);
    }

    /**
     * @Route("/request/{id}", methods={"PUT"})
     */
    public function updateRequest(int $id, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $requestDTO = new RequestDTO(
            $data['mockId'],
            $data['name'],
            $data['type'],
            $data['url'],
            $data['responseCode'],
            $data['responseType'],
            $data['responseBody']
        );
        $this->requestService->updateRequest($id, $requestDTO);

        return new Response('Request updated successfully', Response::HTTP_OK);
    }

    /**
     * @Route("/request/{id}", methods={"DELETE"})
     */
    public function deleteRequest(int $id): Response
    {
        $this->requestService->deleteRequest($id);

        return new Response('Request deleted successfully', Response::HTTP_NO_CONTENT);
    }
}
