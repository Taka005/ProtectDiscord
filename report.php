<?php
require_once __DIR__."/config.php";
require_once __DIR__."/includes/lib.php";
require_once __DIR__."/includes/discord.php";

if(!isset($_SESSION["user"])){
    header("Location: ".url($client_id,$redirect_url,$scopes));
}

if(isset($_GET["id"])){
    $user = user(htmlspecialchars($_GET["id"]),$token);
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Protect Discord</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand text-light" href="./">Protect Discord</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <a class="btn btn-sm btn-outline-secondary" href="./terms" role="button">利用規約</a>
                        <a class="btn btn-sm btn-outline-secondary" href="./privacy-policy" role="button">プライバシーポリシー</a>
                        <a class="btn btn-sm btn-outline-secondary" href="https://discord.gg/7xHNfqYgxb" target="_blank" role="button">サポートサーバー</a>
                    </div>
                    <form class="d-flex">
                        <?php if(!isset($_SESSION["user"])){ ?>
                            <a class="btn btn-outline-success" href="<?= url($client_id,$redirect_url,$scopes) ?>" role="button">ログイン</a>
                        <?php }else{ ?>
                            <a class="btn btn-outline-danger"  href="./includes/logout" role="button">ログアウト</a>
                        <?php } ?>
                    </form>
                </div>
            </nav>
        </header>
	    <main>    
            <form action="./send" method="post" class="mb-4 position-absolute top-50 start-50 translate-middle">
                <?php if(!isset($user)||!isset($_GET["id"])){ ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-light">報告するユーザー</label>
                        <input name="id" type="number" class="form-control" id="exampleFormControlInput1" placeholder="検索するユーザーID">
                    </div>
                <?php }else{ ?>
                    <div class="mb-3">
                        <label for="staticEmail" class="form-label text-light">報告するユーザー</label>
                        <input name="id" type="text" class="form-control" value="<?= $user["id"] ?>" readonly>
                    </div>
                <?php } ?>
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-light">報告内容</label>
                    <select name="class" class="form-select" aria-label="報告内容">
                        <option value="荒らし">荒らし</option>
                        <option value="迷惑行為">迷惑行為</option>
                        <option value="規約違反">規約違反</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-light">報告内容(証拠等のリンクを添付してください)</label>
                    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">送信</button>
                    <a href="./search<?php if($user) echo "?id=".$user["id"] ?>" class="btn btn-outline-primary" role="button">戻る</a>
                </div>
            </form>
	    </main>
        <script src="./assets/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>