セッションでログインを保持
Cookieも必要なら使う

情報はデータベースに保存
.htaccessで/index.phpを/indexのみでアクセスできるようにしてある

./index.php
    検索機能をメイン

    ログインボタンを設置する
./report.php
    報告機能、Discord Oauth必須

    ログインしてなかったら、ログインさせる
./admin/index.php
    管理画面
    ここで報告の承諾等をする
./api/v1.php
    API v1
    検索機能、その他情報を出したりする