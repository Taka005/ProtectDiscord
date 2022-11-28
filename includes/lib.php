<?php
require __DIR__."/../config.php";

function user($id,$token){
    if(!is_numeric($id)) return;
    
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://discord.com/api/v10/users/".$id); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        "Authorization: Bot ".$token,
        "User-Agent:DiscordBot (https://reports.cf, 10)"
    ));
    $res =  curl_exec($ch);
    curl_close($ch);
    return json_decode($res,JSON_BIGINT_AS_STRING,true);
}
?>