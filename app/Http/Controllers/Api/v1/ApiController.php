<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected function sendResponse($status, $message, $data, $httpCode)
    {
        $outPutArray = ['status' => $status, 'code' => $httpCode];
        if (!empty($message)) {
            $outPutArray['message'] = $message;
        }
        if (!empty($data)) {
            $outPutArray['data'] = $data;
        }
        return response()->json($outPutArray, $httpCode);
    }
}
