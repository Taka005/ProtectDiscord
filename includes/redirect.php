<?php
require __DIR__."/discord.php";
require __DIR__."/../config.php";

if(isset($_POST["login"])){
    header("Location: ".url($client_id,$redirect_url,$scopes));
}

if(isset($_POST["logout"])){
    header("Location: ./logout");
}

if(isset($_POST["terms"])){
    header("Location: ../term");
}

if(isset($_POST["privacy-policy"])){
    header("Location: ../privacy-policy");
}
?>