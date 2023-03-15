# tubuyaki-app
Laravel　勉強用

機能

・ログイン機能、会員登録ができる。（既存機能）

・UserIdに紐づく投稿のみ編集、削除可能

・投稿に対してバリデーションあり

・画像投稿機能あり

・投稿編集ページあり

・バッチ処理あり

＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿

これから実装したいもの

・マイページ画面の追加
　
ユーザーごとのアイコンを設定し表示
　
自分が投稿したもののみ表示、編集、修正を行う

・ログイン、会員登録画面　を独立させたい
　
ログイン、会員登録後　tweet一覧画面へ遷移する。

・投稿編集画面から画像の編集も行えるようにしたい
　
投稿のアップデート処理に加えて画像のアップデート処理を追加したい

・投稿に対してお気に入り機能の追加
　

＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿

sailを使えるようにする

composer require laravel/sail --dev　

php artisan sail:install

cd tubuyaki-app && ./vendor/bin/sail up -d

※次回以降　sail up -d を入力してdockerを起動する

localhost　とURLを入力　Laravelの画面が出れば成功

localhost:8025 メールサーバー

sail artisan db:seed テストデータ入れる

sail artisan migrate:fresh --seed　データベースを空にしてデータ入れる


