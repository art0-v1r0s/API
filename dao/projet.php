<?php

require_once __DIR__.'/../utils/database.php';


/**
 * @param string $id
 * @return array|null
 */
function projetById(string $id): ?array {
    $db = getDatabaseConnection();
    $sql = "SELECT id_project,name FROM PROJECT WHERE id_project = ? ";
    $params = [$id];
    return databaseFindOne($db,$sql,$params);
}

function getProjet(?string $id,int $limit,int $offset): ?array{
    $where = "";
    $params = [];//array vide
    if ($id){
        $where = " WHERE association = ?";
        $params[] = $id;
    }

    $db = getDatabaseConnection();
    $sql = "SELECT * FROM PROJECT". $where ." LIMIT $offset,$limit";
    return databaseFindAll($db,$sql,$params);
}