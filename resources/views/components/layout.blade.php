<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width,user-scalabe=no,initial-scale=1.0,
            maximum-scale=1.0,minmum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href = "{{ mix('/css/app.css') }}" rel= "stylesheet">
    <script src="{{ mix('/js/app.js') }} "></script>
<title>{{ $style ?? 'つぶやきアプリ'}}</title>
    <body class="bg-gray-50">
        {{ $slot }}
    </body>
</html>
