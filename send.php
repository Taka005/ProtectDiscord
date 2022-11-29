<?php
require __DIR__."/includes/discord.php";
require __DIR__."/config.php";
require __DIR__."/includes/lib.php";

//if(!isset($_SESSION["user"])){
//    header("Location: ".url($client_id,$redirect_url,$scopes));
//}

if(isset($_POST["id"])&&isset($_POST["class"])&&isset($_POST["content"])){
    $user = user(htmlspecialchars($_POST["id"]),$token);
    if(isset($user)){
        $success = true;
    }else{
        $success = false;
    }
}else{
    $success = false;
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Protect Discord</title>

    <link rel="stylesheet" href="./assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <header class="fixed-top">
        <nav class="navbar navbar-expand-md avbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-light my5" href="./">Protect Discord</a>
                <form class="container-fluid justify-content-start">
                    <a class="btn btn-sm btn-outline-secondary" href="./terms" role="button">利用規約</a>
                    <a class="btn btn-sm btn-outline-secondary" href="./privacy-policy" role="button">プライバシーポリシー</a>
                    <a class="btn btn-sm btn-outline-secondary" href="https://discord.gg/7xHNfqYgxb" target="_blank" role="button">サポートサーバー</a>
                </form>
                <form class="form-inline">
                    <?php if(!isset($_SESSION["user"])){ ?>
                        <a class="btn btn-outline-success my-2 my-sm-0" href="<?= url($client_id,$redirect_url,$scopes) ?>" role="button">ログイン</a>
                    <?php }else{ ?>
                        <a class="btn btn-outline-danger my-2 my-sm-0"  href="./includes/logout" role="button">ログアウト</a>
                    <?php } ?>
                </form>
            </div>
        </nav>
    </header>
	<main>    
    <?php if($success){ ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">正常に送信されました</h5>
                <p class="card-text">審査に時間がかかりますので、お待ちください。<br>結果を報告するため、DiscordのDMを受信できるようにしておいてください</p>
                <a href="./" class="btn btn-primary">トップに戻る</a>
            </div>
        </div>
    <?php }else{ ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">正常に送信できませんでした</h5>
                <p class="card-text">一部の項目が入力されていないか、指定したユーザーが存在しませんでした</p>
                <a href="./" class="btn btn-primary">トップに戻る</a>
            </div>
        </div>
    <?php } ?>
	</main>    
    <script src="./assets/js/script.js"></script>
</body>