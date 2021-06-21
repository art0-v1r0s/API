<?php

require_once __DIR__.'/../dao/association.php';
require_once __DIR__.'/../dao/projet.php';

function ensureHttpMethod(string $method):void{
    if ($_SERVER["REQUEST_METHOD"]!==$method){
        http_response_code(400);
        die();
    }
}
