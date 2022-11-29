<?php
require __DIR__."/config.php";
require __DIR__."/includes/discord.php";

//if(!isset($_SESSION["user"])){
//    header("Location: ".url($client_id,$redirect_url,$scopes));
//}

$id = htmlspecialchars($_GET["id"]);
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
        <form action="" method="post" class="mb-4 position-absolute top-50 start-50 translate-middle">
            <?php if(!isset($id)){ ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-light">報告するユーザー</label>
                <input name="id" type="number" type="text" class="form-control" id="exampleFormControlInput1" placeholder="検索するユーザーID" required>
            </div>
            <?php } ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-light">返信用メールアドレス</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-light">報告内容</label>
                <select class="form-select" aria-label="報告内容">
                    <option selected>内容を選択してください</option>
                    <option value="1">荒らし</option>
                    <option value="2">迷惑行為</option>
                    <option value="3">その他</option>
            </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label text-light">報告内容(証拠等のリンクを添付してください)</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <a href="./report" class="btn btn-success">送信</a>
                <a href="./search?id=<?= $id ?>" class="btn btn-outline-dark">戻る</a>
            </div>
        </form>
	</main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>