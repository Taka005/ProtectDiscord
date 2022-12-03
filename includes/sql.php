<?php
function sql($query){
    $database = require __DIR__."/../config.php";
    $pdo = new PDO("mysql:host=".$database["server"].";dbname=".$database["name"].";charset=utf8",$database["user"],$database["password"]);
    $res = $pdo->query($query);
    return $res;
}
?>