<?php
require __DIR__."/config.php";
require __DIR__."/includes/discord.php";

if(!isset($_SESSION["user"])){
    header("Location: ".url($client_id,$redirect_url,$scopes));
}
?>