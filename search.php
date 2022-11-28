<?php
require __DIR__."/includes/discord.php";
require __DIR__."/config.php";
require __DIR__."/includes/lib.php";

if(isset($_GET["id"])){
    $user = user(htmlspecialchars($_GET["id"]),$token);
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
        <?php if(isset($user)&&isset($_GET["id"])){ ?>
            <div class="card text-center">
                <div class="card-header">
                    <?= $user["id"] ?>
                </div>
                <img src="<?= "https:\/\/cdn.discordapp.com/avatars/".$user["id"]."/".$user["avatar"].is_animated($user["avatar"])."?size=1024" ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $user["username"]."#".$user["discriminator"] ?></h5>
                    <p class="card-text">製作中....</p>
                    <a href="./report" class="btn btn-danger">報告</a>
                    <a href="./" class="btn btn-outline-dark">戻る</a>
                </div>
            </div>
        <?php }else if(isset($_GET["id"])){ ?>
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">対象のユーザは見つかりませんでした</h5>
                    <a href="./" class="btn btn-outline-dark">戻る</a>
                </div>
            </div>
        <?php }else{ ?>
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">検索するユーザーを指定してください</h5>
                    <a href="./" class="btn btn-outline-dark">戻る</a>
                </div>
            </div>
        <?php } ?>
	</main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>