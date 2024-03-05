##アプリケーション名

フリマアプリ

##作成した目的

模擬案件を通して実開発に近い経験を積む

##環境

Windows10Pro
Ubuntu 20.04.3
Docker 24.0.7
nginx 1.25.3
PHP 8.3.2
Laravel 8.83.27
MySQL 8.0.36
node.js 12.22.9

##開発環境導入方法

・Githubから任意のディレクトリに　git@github.com:naoneko1974/furima.git　をクローン。

・furimaディレクトリでdocker compose up -d --build 実行しdockerコンテナを作成。

・PHPコンテナ内で composer install 実行。

・PHPコンテナ内で php artisan migrate および php artisan db:seed 実行。

・シンボリックリンク php artisan storage:link 実行。

・ユーザー認証：fortifyを使用

・メール送信：Mailtrapを使用（開発環境）

・PHPUnitテスト環境構築

##アプリケーションURL

http://localhost

##機能一覧

・会員登録（利用者）

・ログイン

・ログアウト

・商品一覧取得

・商品詳細取得

・商品検索

・ユーザ商品お気に入り一覧取得

・ユーザ情報取得

・ユーザ購入商品一覧取得

・ユーザ出品商品一覧取得

・プロフィール変更

・商品お気に入り追加

・商品お気に入り削除

・商品コメント追加

・商品コメント削除

・出品

・購入

・配送先変更

・管理：ユーザ招待

・管理：ユーザ削除（論理削除）

・管理：ユーザ復元

・管理：ユーザ削除（物理削除）

・管理：メール送信

・店舗代表：ショップスタッフ招待

・店舗代表：ショップスタッフ削除

##その他

・管理者ユーザー

 メールアドレス：manager@manage.com
 
 パスワード：password
