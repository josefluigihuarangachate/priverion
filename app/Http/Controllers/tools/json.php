<?php

function json($status, $msg, $data) {

    $code = 200;
    if (!$status || strtolower($status) == 'error') {
        $status = 'Error';
        $code = 404;
    }
    if (!$msg) {
        $msg = 'Acceso Denegado';
    }
    if (!$data) {
        $data = array();
    }
    $json = array(
        'code' => $code,
        'status' => ucwords($status),
        'msg' => $msg,
        'data' => $data
    );

    return $json;
}

function jsonPrint($data) {
    return response()->json($data, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
}
