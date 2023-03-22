<?php

use Core\Response;

// Turns 1, 2, 3, 4.. into 1st, 2nd, 3rd, 4th..
function ordinal($number)
{
    if ($number == 1) {
        return $number . 'st';
    } elseif ($number == 2) {
        return $number . 'nd';
    } elseif ($number == 3) {
        return $number . 'rd';
    } elseif ($number >= 4) {
        return $number . 'th';
    }
}




function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}
