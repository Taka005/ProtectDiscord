<?php
require __DIR__."/includes/discord.php";
require __DIR__."/config.php";
require __DIR__."/includes/lib.php";

if(!isset($_SESSION["user"])){
    header("Location: ".url($client_id,$redirect_url,$scopes));
}

if($_POST["id"]&&$_POST["class"]&&$_POST["content"]){
    $user = user(htmlspecialchars($_POST["id"]),$token);
    $class = htmlspecialchars($_POST["id"]);
    $content = htmlspecialchars($_POST["content"]);
    if(isset($user)){
        $res = sql($database,"SELECT * FROM tmp WHERE user = ".$user." LIMIT 1;");
        if(!$res){
            sql($database,"INSERT INTO tmp (time,reporter,user,class,content,id) VALUES (NOW(),".$_SESSION["user_id"].",".$user.",".$class.",".$content.",".id(18).")");
            $success = true;
        }else{
            $success = false;
        }
    }else{
        $success = false;
    }
}else{
    $success = false;
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
            <div class="position-absolute top-50 start-50 translate-middle">
                <?php if($success){ ?>
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h5 class="card-title">正常に送信されました</h5>
                            <p class="card-text">審査には時間がかかることがあります<br>審査に通過するとデータベースに登録されます</p>
                            <a href="./" class="btn btn-primary">トップに戻る</a>
                            <a href="./log" class="btn btn-secondary">ログ</a>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <h5 class="card-title">正常に送信できませんでした</h5>
                            <p class="card-text">一部の項目が入力されていないか<br>指定したユーザーが存在しませんでした</p>
                            <a href="./" class="btn btn-primary">トップに戻る</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
	    </main>    
        <script src="./assets/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>