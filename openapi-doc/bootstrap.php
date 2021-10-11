<?php
declare(strict_types=1);

if (!function_exists('api_bootstrap')) {
    /**
     * Get the path to the openapi bootstrap folder.
     */
    function api_bootstrap()
    {
        return __DIR__;
    }
}

if (!function_exists('api_default_responses')) {
    /**
     * Get the path to the api default responses folder.
     */
    function api_default_responses()
    {
        return __DIR__.'/../src/Http/Responses';
    }
}

/**
 * @OA\Info(
 *   title=DOC_API_NAME,
 *   version=DOC_API_VERSION,
 *   @OA\Contact(
 *     email=DOC_API_CONTACT,
 *   )
 * )
 * @OA\Components(
 *  @OA\Response(
 *      response="200",
 *      description="Success Response",
 *      @OA\JsonContent(
 *          example="{}",
 *      )
 *  ),
 *  @OA\Response(
 *      response="400",
 *      description="Bad Request Response",
 *      @OA\JsonContent(
 *          @OA\Property(
 *              property="error",
 *              readOnly=true,
 *              format="int32",
 *              type="integer",
 *              example=400
 *          ),
 *          @OA\Property(
 *              property="message",
 *              readOnly=true,
 *              format="string",
 *              type="string",
 *              example="Bad Request"
 *          ),
 *      )
 *  ),
 *  @OA\Response(
 *      response="401",
 *      description="Unathorized Response",
 *      @OA\JsonContent(
 *          @OA\Property(
 *              property="error",
 *              readOnly=true,
 *              format="int32",
 *              type="integer",
 *              example=401
 *          ),
 *          @OA\Property(
 *              property="message",
 *              readOnly=true,
 *              format="string",
 *              type="string",
 *              example="Unauthorized"
 *          ),
 *      )
 *  ),
 *  @OA\Response(
 *      response="403",
 *      description="Forbidden Response",
 *      @OA\JsonContent(
 *          @OA\Property(
 *              property="error",
 *              readOnly=true,
 *              format="int32",
 *              type="integer",
 *              example=403
 *          ),
 *          @OA\Property(
 *              property="message",
 *              readOnly=true,
 *              format="string",
 *              type="string",
 *              example="Forbidden"
 *          ),
 *      )
 *  ),
 *  @OA\Response(
 *      response="404",
 *      description="Not Found Response",
 *      @OA\JsonContent(
 *          @OA\Property(
 *              property="error",
 *              readOnly=true,
 *              format="int32",
 *              type="integer",
 *              example=404
 *          ),
 *          @OA\Property(
 *              property="message",
 *              readOnly=true,
 *              format="string",
 *              type="string",
 *              example="Not Found"
 *          ),
 *      )
 *  ),
 *  @OA\Response(
 *      response="429",
 *      description="Too Many Requests Response",
 *      @OA\JsonContent(
 *          @OA\Property(
 *              property="error",
 *              readOnly=true,
 *              format="int32",
 *              type="integer",
 *              example=429
 *          ),
 *          @OA\Property(
 *              property="message",
 *              readOnly=true,
 *              format="string",
 *              type="string",
 *              example="Too Many Requests"
 *          ),
 *      )
 *  ),
 *  @OA\Response(
 *      response="500",
 *      description="Server Error Response",
 *      @OA\JsonContent(
 *          @OA\Property(
 *              property="error",
 *              readOnly=true,
 *              format="int32",
 *              type="integer",
 *              example=500
 *          ),
 *          @OA\Property(
 *              property="message",
 *              readOnly=true,
 *              format="string",
 *              type="string",
 *              example="Server Error"
 *          ),
 *      )
 *  ),
 * )
 */
