<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width,user-scalabe=no,initial-scale=1.0,
            maximum-scale=1.0,minmum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>つぶやきアプリ</title>
            <body>
                <h1>つぶやきアプリ</h1>
                <div>
                    @foreach ($tweets as $tweet)
                        <p>{{ $tweet->content }}</p>
                    @endforeach
                </div>

    </body>
</html>
