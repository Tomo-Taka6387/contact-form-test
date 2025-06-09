お問い合せフォーム

環境構築
#リポジトリをクローン
$ git clone git@github.com:coachtech-material/laravel-docker-template.git

#Dockerの設定
$ docker-compose up -d --build

#laravelパッケージのインストール
$ composer install

#.env　ファイルコピー作成

#マイグレーションとシーディング
$ artisan migrate --seed

使用技術
・Laravel 10.x
・PHP 8.2
・MySQL 8.x
・Laravel Fortify

ER図
![ER図](./er-contact.png)

URL
・環境開発：Http://localhost
・お問い合せフォーム：/
・管理画面(要ログイン)：/dashboard