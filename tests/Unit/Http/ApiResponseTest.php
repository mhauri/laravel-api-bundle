<?php

declare(strict_types=1);

namespace MHauri\ApiBundle\Tests\Http;

use MHauri\ApiBundle\Http\ApiResponse;
use MHauri\ApiBundle\Http\Responses\ErrorResponse;
use PHPUnit\Framework\TestCase;

class ApiResponseTest extends TestCase
{
    public function testEmptyResponse()
    {
        $this->assertSame(null, ApiResponse::empty()->getObject());
    }

    public function testBadRequest()
    {
        $this->assertSame(['statusCode' => 400, 'message' => 'Bad Request'], ApiResponse::badRequest()->getObject());
    }

    public function testUnauthorized()
    {
        $this->assertSame(['statusCode' => 401, 'message' => 'Unauthorized'], ApiResponse::unauthorized()->getObject());
    }

    public function testForbidden()
    {
        $this->assertSame(['statusCode' => 403, 'message' => 'Forbidden'], ApiResponse::forbidden()->getObject());
    }

    public function testNotFound()
    {
        $_SERVER['REQUEST_URI'] = '/';
        $this->assertSame(['statusCode' => 404, 'message' => 'Resource not found: /'], ApiResponse::notFound()->getObject());
    }

    public function testTooManyRequests()
    {
        $this->assertSame(['statusCode' => 429, 'message' => 'Too Many Requests'], ApiResponse::tooManyRequests()->getObject());
    }

    public function testFromDTO()
    {
        $dto = new ErrorResponse();
        $dto->error = 500;
        $dto->message = 'Server Error';
        $this->assertSame($dto, ApiResponse::fromDTO($dto)->getObject());
    }

    public function testFromArray()
    {
        $dto = new ErrorResponse();
        $dto->error = 500;
        $dto->message = 'Server Error';
        $this->assertSame('[{"error":500,"message":"Server Error"}]', ApiResponse::fromArray([$dto])->getContent());
    }
}
