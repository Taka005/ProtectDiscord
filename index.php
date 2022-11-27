<?php
require "./includes/discord.php";
require "./config.php";
require "./includes/lib.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Protect Discord</title>

    <link rel="stylesheet" href="./assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<main>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Protect Discord</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">ホーム</a>
                        <a class="nav-link" href="#">利用規約</a>
                        <a class="nav-link" href="#">プライバシーポリシー</a>
                    </div>
                </div>
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit">ログイン</button>
                </form>
            </div>
        </nav>
        <div class="position-absolute start-50 translate-middle">
		    <h1 class="text-center text-light my-5">Protect Discord</h1>
        </div>
        <form action="" method="post" class="mb-4 position-absolute top-50 start-50 translate-middle">
            <input name="id" class="form-control form-control-lg" placeholder="検索するユーザーID" autocomplete="off" required>
        </form>
	</main>
</body>
