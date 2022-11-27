<?php
require __DIR__."/includes/discord.php";
require __DIR__."/config.php";
require __DIR__."/includes/lib.php";
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
                <a class="navbar-brand text-light my5">Protect Discord</a>
                <form class="container-fluid justify-content-start" action="./includes/redirect" method="post">
                    <button class="btn btn-sm btn-outline-secondary">利用規約</button>
                    <button class="btn btn-sm btn-outline-secondary">プライバシーポリシー</button>
                </form>
                <form class="form-inline" action="./includes/redirect" method="post">
                    <?php if(!isset($_SESSION["user"])){ ?>
                        <button class="btn btn-outline-success my-2 my-sm-0" name="login">ログイン</button>
                    <?php }else{ ?>
                        <button class="btn btn-outline-danger my-2 my-sm-0" name="logout">ログアウト</button>
                    <?php } ?>
                </form>
            </div>
        </nav>
    </header>
	<main>    
        <div class="position-absolute start-50 translate-middle">
		    <h1 class="text-center text-light my-5 display-4">Protect Discord</h1>
        </div>
        <form action="" method="post" class="mb-4 position-absolute top-50 start-50 translate-middle">
            <input name="id" class="form-control form-control-lg" placeholder="検索するユーザーID" autocomplete="off" required>
        </form>
	</main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>