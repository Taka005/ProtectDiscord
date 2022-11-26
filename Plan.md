セッションでログインを保持
Cookieも必要なら使う
Boostrap等でサイトをデザインする

情報はデータベースに保存
.htaccessで/index.phpを/indexのみでアクセスできるようにしてある

./index.php
    検索機能をメイン

    ログインボタンを設置する
./report.php
    報告機能、Discord Oauth必須

    ログインしてなかったら、ログインさせる
    レポート対象のユーザーはAPIを叩いて確認
./admin.php
    管理画面
    ここで報告の承諾等をする
./api/
    API
    検索機能、その他情報を出したりする
./includes/
    バックエンド処理用