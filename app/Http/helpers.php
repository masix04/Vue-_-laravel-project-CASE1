<?php

use App\AppConstants;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

// not using Yet
function getShortName($string) {
    $words = explode(' ', $string);
    if ($words && count($words) == 1) {
        return $string;
    } else {
        return strtoupper(substr($words[0], 0, 1)) . ' ' . $words[1] . (isset($words[2]) ? ' ' . $words[2] : '');
    }
}

// Not using Yet
function returnResponse($status, $data, $msg)
{
    $content = ['status' => $status, 'message' => $msg, 'result' => $data];
    return response()->json(clearNull($content), 200);
}
