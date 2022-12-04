<?php
function user($id,$token){
    if(!is_numeric($id)) return;
    
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://discord.com/api/v10/users/".$id); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        "Authorization: Bot ".$token,
        "User-Agent:DiscordBot (https://reports.cf, 10)",
        "Content-type: application/json"
    ));
    $res =  curl_exec($ch);
    curl_close($ch);
    $json = json_decode($res,true);
    if(isset($json["message"])) return;
    return $json;
}

function is_animated($image){
	$ext = substr($image, 0, 2);
	if($ext == "a_"){
		return ".gif";
	}else{
		return ".png";
	}
}

function id($n){
    $random = substr(str_shuffle("abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZY0123456789"),0,$n);
    return $random;
}

function sql($query){
    $database = require_once __DIR__."/../config.php";
    $pdo = new PDO("mysql:host=".$database["server"].";dbname=".$database["name"].";charset=utf8",$database["user"],$database["password"]);
    $res = $pdo->query($query);
    return $res;
}
?>