<?php

function arrayIsAssociative(array $arr)
{
    return array_keys($arr)  !== range(0, count($arr) - 1);
}

function isAjax()
{

//    var_dump(apache_request_headers());
//    var_dump($_SERVER);
//    die();

    if (isset($_SERVER['HTTP_HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_HTTP_X_REQUESTED_WITH']  === 'XMLHttpRequest') {
        return true;
    }
    //header("Status: 401 Missing header");
}

function debug($data)
{
    if ($_ENV['PRODUCTION'] === 'true') {
        var_dump('Something get wrong');
    }
    var_dump($data);
}