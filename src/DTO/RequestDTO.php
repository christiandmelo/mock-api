<?php

namespace App\DTO;

class RequestDTO
{
    private $mockId;
    private $name;
    private $type;
    private $url;
    private $responseCode;
    private $responseType;
    private $responseBody;

    public function __construct(int $mockId, string $name, string $type, string $url, int $responseCode, string $responseType, string $responseBody)
    {
        $this->mockId = $mockId;
        $this->name = $name;
        $this->type = $type;
        $this->url = $url;
        $this->responseCode = $responseCode;
        $this->responseType = $responseType;
        $this->responseBody = $responseBody;
    }

    public function getMockId(): int
    {
        return $this->mockId;
    }

    public function setMockId(int $mockId): void
    {
        $this->mockId = $mockId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    public function setResponseCode(int $responseCode): void
    {
        $this->responseCode = $responseCode;
    }

    public function getResponseType(): string
    {
        return $this->responseType;
    }

    public function setResponseType(string $responseType): void
    {
        $this->responseType = $responseType;
    }

    public function getResponseBody(): string
    {
        return $this->responseBody;
    }

    public function setResponseBody(string $responseBody): void
    {
        $this->responseBody = $responseBody;
    }
}
