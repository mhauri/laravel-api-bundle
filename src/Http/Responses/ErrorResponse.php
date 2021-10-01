<?php

declare(strict_types=1);

namespace MHauri\ApiBundle\Http\Responses;

use MHauri\ApiBundle\DTO;

/**
 * @OA\Schema(
 *     description="Error Response",
 *     title="Error Response",
 * )
 */
class ErrorResponse implements DTO
{
    /**
     * @OA\Property(
     *     readOnly=true,
     *     format="int32",
     *     example=400
     * )
     */
    public int $error;

    /**
     * @OA\Property(
     *     readOnly=true,
     *     format="string",
     *     example="Bad Request"
     * )
     */
    public string $message;
}
