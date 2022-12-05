<?php
require_once __DIR__."/includes/discord.php";
require_once __DIR__."/config.php";
require_once __DIR__."/includes/lib.php";

if(!isset($_SESSION["user"])){
    header("Location: ".url($client_id,$redirect_url,$scopes));
}

if(!in_array($_SESSION["user_id"],$admin)){
    header("Location: ./");
}

if(isset($_POST["pass"])){
    $tmp = sql("SELECT * FROM tmp WHERE user = ".$_POST["pass"]." LIMIT 1;")->fetch(PDO::FETCH_BOTH);
    if($tmp){
        sql("INSERT INTO report (time,reporter,user,class,content,id,block) VALUES (NOW(),".$tmp["reporter"].",".$tmp["user"].",'".$tmp["class"]."','".$tmp["content"]."','".$tmp["id"]."',false)");
        sql("INSERT INTO log (time,reporter,user,reason,id,event) VALUES (NOW(),".$tmp["reporter"].",".$tmp["user"].",'".$tmp["class"]."','".$tmp["id"]."','追加')");
        sql("DELETE FROM tmp WHERE user=".$tmp["user"]." LIMIT 1;");
        $success = true;
    }else{
        $success = false;
    }
}else if(isset($_POST["block"])){
    $tmp = sql("SELECT * FROM tmp WHERE user = ".$_POST["pass"]." LIMIT 1;")->fetch(PDO::FETCH_BOTH);
    if($tmp){
        sql("INSERT INTO report (time,reporter,user,class,content,id,block) VALUES (NOW(),".$tmp["reporter"].",".$tmp["user"].",'".$tmp["class"]."','".$tmp["content"]."','".$tmp["id"]."',true)");
        sql("INSERT INTO log (time,reporter,user,reason,id,event) VALUES (NOW(),".$tmp["reporter"].",".$tmp["user"].",'".$tmp["class"]."','".$tmp["id"]."','追加(ブロック)')");
        sql("DELETE FROM tmp WHERE user=".$tmp["user"]." LIMIT 1;");
        $success = true;
    }else{
        $success = false;
    }
}else if(isset($_POST["reject"])){
    $tmp = sql("SELECT * FROM tmp WHERE user = ".$_POST["pass"]." LIMIT 1;")->fetch(PDO::FETCH_BOTH);
    if($tmp){
        sql("DELETE FROM tmp WHERE user=".$tmp["user"]." LIMIT 1;");
        sql("INSERT INTO log (time,reporter,user,reason,id,event) VALUES (NOW(),".$tmp["reporter"].",".$tmp["user"].",'".$tmp["class"]."','".$tmp["id"]."','拒否')");
        $success = true;
    }else{
        $success = false;
    }
}

$res = sql("SELECT * FROM tmp;")->fetchALL(PDO::FETCH_BOTH);

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
            <?php if($success == true){ ?>
                <div class="alert alert-success" role="alert">
                    正常に追加しました
                </div>
            <?php }else if($success == false){ ?>
                <div class="alert alert-danger" role="alert">
                    追加できませんでした
                </div>
            <?php } ?>
            <div class="mb-4 position-absolute top-50 start-50 translate-middle">
                <table class="table table-light table-bordered table-sm align-middle text-center">
                    <thead>
                        <tr>
                            <th scope="col">時間</th>
                            <th scope="col">対象ユーザー</th>
                            <th scope="col">報告ユーザー</th>
                            <th scope="col">分類</th>
                            <th scope="col">内容</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($res as $row){ ?>
                            <tr>
                                <th scope="row"><?= $row["time"] ?></th>
                                <td><?= htmlspecialchars($row["user"]) ?></td>
                                <td><?= htmlspecialchars($row["reporter"]) ?></td>
                                <td><?= htmlspecialchars($row["class"]) ?></td>
                                <td><?= htmlspecialchars($row["content"]) ?></td>
                                <td>
                                    <form action="./admin" method="post">
                                        <a name="pass" value="<?= $row["user"] ?>" class="btn btn-outline-success btn-sm" role="button">登録</button>
                                        <a name="block" value="<?= $row["user"] ?>" class="btn btn-outline-success btn-sm" role="button">ブロック対象として登録</button>
                                        <a name="reject" value="<?= $row["user"] ?>" class="btn btn-outline-danger btn-sm" role="button">拒否</button>
                                    </form>
                                </td>
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
</html>