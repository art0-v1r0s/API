<?php

require_once __DIR__.'/../utils/database.php';

/**
 * @param string $id
 * @return array|null
 */
function associationById(string $id): ?array {
    $db = getDatabaseConnection();
    $sql = "SELECT id_association,name FROM ASSOCIATION WHERE id_association = ? ";
    $params = [$id];
    return databaseFindOne($db,$sql,$params);
}

function getAssociation(?string $id,int $limit,int $offset): ?array{
    $where = "";
    $params = [];//array vide
    if ($id){
        $where = " WHERE id_association = ?";
        $params[] = $id;
    }

    $db = getDatabaseConnection();
    $sql = "SELECT * FROM ASSOCIATION". $where ." LIMIT $offset,$limit";
    return databaseFindAll($db,$sql,$params);
}
