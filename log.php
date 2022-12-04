<?php
require_once __DIR__."/includes/discord.php";
require_once __DIR__."/config.php";
require_once __DIR__."/includes/lib.php";

$res = sql("SELECT * FROM log;")->fetchALL(PDO::FETCH_BOTH);
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
            <div class="mb-4 position-absolute top-50 start-50 translate-middle">
                <table class="table table-light table-bordered table-sm align-middle">
                    <thead>
                        <tr>
                            <th scope="col">時間</th>
                            <th scope="col">イベント</th>
                            <th scope="col">対象ユーザー</th>
                            <th scope="col">報告ユーザー</th>
                            <th scope="col">理由</th>
                            <th scope="col">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($res as $row){ ?>
                            <tr>
                                <th scope="row"><?= $row["time"] ?></th>
                                <td><?=  $row["event"] ?></td>
                                <td><?= htmlspecialchars($row["user"]) ?></td>
                                <td><?= htmlspecialchars($row["reporter"]) ?></td>
                                <td><?= htmlspecialchars($row["reason"]) ?></td>
                                <td><?= htmlspecialchars($row["id"]) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
	    </main>    
        <script src="./assets/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</hmtl>