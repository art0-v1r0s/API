<?php
/**
 * @return PDO
 */
function getDatabaseConnection():PDO {
    $host = "localhost";
    $port = "3306";
    $driver = "mysql";
    $dbname = "predfackers";
    $user = "root2";
    $pwd = "toor";
//    return new PDO("$driver:host=$host;port=$port;dbname=$dbname;charset=utf8",$user,$pwd);

    try {
        return new PDO("$driver:host=$host;port=$port;dbname=$dbname;charset=utf8",$user,$pwd);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

/**
 * @param PDO $db
 * @param string $sql
 * @param array $params
 * @return array|null
 */
function databaseFindOne(PDO $db,string $sql,array $params):?array {
    $statement = $db->prepare($sql);
    if ($statement){
        $success = $statement->execute($params);
        if ($success){
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result){
                return $result;
            }
        }
    }
    return null;
}

/**
 * @param PDO $db
 * @param string $sql
 * @param array $params
 * @return array|null
 */
function databaseFindAll(PDO $db,string $sql,array $params):?array {
    $statement = $db->prepare($sql);
    if ($statement){
        $succes = $statement->execute($params);
        if ($succes){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    return null;
}

