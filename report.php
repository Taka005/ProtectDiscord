<?php
require __DIR__."/config.php";
require __DIR__."/includes/lib.php";
require __DIR__."/includes/discord.php";

if(!isset($_SESSION["user"])){
    header("Location: ".url($client_id,$redirect_url,$scopes));
}

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
</body>