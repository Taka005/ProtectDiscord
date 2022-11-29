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

function dm($id,$message,$token){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://discord.com/api/v10/users/@me/channels".$id); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{'recipient_id':".$id."}");
    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        "Authorization: Bot ".$token,
        "User-Agent:DiscordBot (https://reports.cf, 10)",
        "Content-type: application/json"
    ));
    $res =  curl_exec($ch);
    curl_close($ch);
    $json = json_decode($res,true);

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://discord.com/api/v10/channels/".$json["id"]."/messages"); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{'content':".$message."}");
    curl_setopt($ch,CURLOPT_HTTPHEADER,array(
        "Authorization: Bot ".$token,
        "User-Agent:DiscordBot (https://reports.cf, 10)",
        "Content-type: application/json"
    ));
    $res =  curl_exec($ch);
    curl_close($ch);
    $json = json_decode($res,true);
    return $json;
}
?>