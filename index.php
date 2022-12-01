<?php
require __DIR__."/includes/discord.php";
require __DIR__."/config.php";
?>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Protect Discord</title>

        <link rel="stylesheet" href="./assets/css/style.css">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand text-light" href="./">Protect Discord</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <a class="btn btn-sm btn-outline-secondary" href="./terms" role="button">利用規約</a>
                        <a class="btn btn-sm btn-outline-secondary" href="./privacy-policy" role="button">プライバシーポリシー</a>
                        <a class="btn btn-sm btn-outline-secondary" href="https://discord.gg/7xHNfqYgxb" target="_blank" role="button">サポートサーバー</a>
                        <form class="justify-content-end">
                            <?php if(!isset($_SESSION["user"])){ ?>
                                <a class="btn btn-outline-success my-2 my-sm-0" href="<?= url($client_id,$redirect_url,$scopes) ?>" role="button">ログイン</a>
                            <?php }else{ ?>
                                <a class="btn btn-outline-danger my-2 my-sm-0"  href="./includes/logout" role="button">ログアウト</a>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
	    <main>    
            <div class="mb-4 position-absolute start-50 translate-middle">
		        <h1 class="text-center text-light my-5 display-4">Protect Discord</h1>
            </div>
            <form action="./search" method="get" class="mb-4 position-absolute top-50 start-50 translate-middle">
                <input name="id" type="number" class="form-control form-control-lg" placeholder="検索するユーザーID" autocomplete="off" required>
            </form>
	    </main>   
        <script src="./assets/js/script.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>