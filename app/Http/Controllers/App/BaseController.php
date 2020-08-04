<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @param string $redirectUrl
     *
     * @return JsonResponse|Response
     */
    public function sendJsonRedirectResponse(string $redirectUrl)
    {
        return response()->json(['redirect' => $redirectUrl], 200);
    }

    /**
     * success response method.
     *
     * @param        $result
     * @param string $message
     *
     * @return JsonResponse|Response
     */
    public function sendResponse($result, $message = 'Success')
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @param       $error
     * @param array $errorMessages
     * @param int   $code
     *
     * @return JsonResponse|Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
            'code'    => $code,
        ];

        if ( !empty($errorMessages) ) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}

