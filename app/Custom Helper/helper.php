<?php

if (!function_exists('isActiveRoute')) {
    function isActiveRoute($routeNames)
    {
        return request()->routeIs($routeNames) ? 'active' : '';
    }
}

if (!function_exists('apiResponse')) {
    function apiResponse($statusCode , $message , $error_code , $data = null )
    {
        return response()->json([
            'status' => $statusCode,
            'msg' => $message,
            'error_code' => $error_code,
            'data' => $data,
        ]);
    }
}