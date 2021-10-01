<?php

declare(strict_types=1);

namespace MHauri\ApiBundle\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use MHauri\ApiBundle\DTO;
use MHauri\ApiBundle\Http\Responses\ErrorResponse;

class ApiResponse extends JsonResponse
{
    private $object;

    public function __construct($object, ?int $httpStatus = null)
    {
        $this->object = $object;

        parent::__construct(
            $object,
            $httpStatus ?: Response::HTTP_OK
        );
    }

    public function getObject()
    {
        return $this->object;
    }

    public static function fromArray(array $object, ?int $httpStatus = null): self
    {
        return new self($object, $httpStatus);
    }

    public static function unauthorized(): self
    {
        return new self(self::response(Response::HTTP_UNAUTHORIZED, 'Unauthorized'), Response::HTTP_UNAUTHORIZED);
    }

    public static function forbidden(): self
    {
        return new self(self::response(Response::HTTP_FORBIDDEN, 'Forbidden'), Response::HTTP_UNAUTHORIZED);
    }

    public static function notFound(): self
    {
        return new self(
            self::response(Response::HTTP_NOT_FOUND, sprintf('Route not found: %s', $_SERVER['REQUEST_URI'])),
            Response::HTTP_NOT_FOUND
        );
    }

    public static function tooManyRequests(): self
    {
        return new self(
            self::response(Response::HTTP_TOO_MANY_REQUESTS, 'Too Many Requests'),
            Response::HTTP_TOO_MANY_REQUESTS
        );
    }

    public static function badRequest(int $code = Response::HTTP_BAD_REQUEST, string $message = 'Bad Request')
    {
        return new self(self::response($code, $message), $code);
    }

    public static function empty(): self
    {
        return new self(null);
    }

    public static function fromDTO(DTO $dto, ?int $httpStatus = null): self
    {
        if (!$httpStatus && $dto instanceof ErrorResponse) {
            $httpStatus = Response::HTTP_BAD_REQUEST;
        }

        return new self($dto, $httpStatus);
    }

    private static function response(int $code, string $message)
    {
        return [
            'code' => $code,
            'message' => $message,
        ];
    }
}
