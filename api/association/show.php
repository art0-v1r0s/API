<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__.'./../../dao/association.php';
require_once __DIR__.'./../../utils/server.php';

ensureHttpMethod('GET');

header("content-Type: application/json");

$id = $_GET["id_association"] ?? null;
$limit = isset($_GET["limit"]) ? intval($_GET["limit"]):10;
$offset = isset($_GET["offset"]) ? intval($_GET["offset"]):0;

$association = getAssociation($id,$limit,$offset);
if ($association){
    echo json_encode($association);
}else{
    http_response_code(500);
}

?>