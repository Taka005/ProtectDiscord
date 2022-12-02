<?php
require __DIR__."/discord.php";
require __DIR__."/../config.php";

init($redirect_url,$client_id,$secret_id);
get_user($pdo);

header("Location: ../");
exit;
?>