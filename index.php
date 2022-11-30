<?php
require __DIR__."/includes/discord.php";
require __DIR__."/config.php";
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
        <div class="mb-4 position-absolute start-50 translate-middle">
		    <h1 class="text-center text-light my-5 display-4">Protect Discord</h1>
        </div>
        <form action="./search" method="get" class="mb-4 position-absolute top-50 start-50 translate-middle">
            <input name="id" type="number" class="form-control form-control-lg" placeholder="検索するユーザーID" autocomplete="off" required>
        </form>
	</main>   
    <script src="./assets/js/script.js"></script>
</body>