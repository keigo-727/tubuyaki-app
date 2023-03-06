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
                <h1>つぶやきを編集する</h1>
                <div>
                    <a href="{{ route('tweet.index') }}"> << 戻る  </a>
                    <p>投稿フォーム</p>
                    <form action = "{{ route('tweet.update.put', ['tweetId' => $tweet->id] ) }}" method ="post">
                    @method('PUT')
                    @csrf
                    <label for="tweet-content">つぶやき</label>
                    <span>140文字まで</span>
                    <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"  > 
                        {{ $tweet->content }} </textarea>
                @error('tweet')
                    <p style="color: red;"> {{ $message }} </p>
                @enderror
                
                    <button type="submit">編集</button>
                @if (session('feedback.success'))
                    <p style="cplor:green">{{session('feedback.success') }} </p>
                @endif

                @foreach($tweet as $tweet)
                    <details>
                        <summary>{isset({ $tweet->content })}</summary>
                        <div>
                            <a href= "{{ route('tweet.update.index',['tweetId' => $tweet->id ]) }}" >編集</a>
                        </div>
                    </details>
                @endforeach
                    </form>
                </div>
    </body>
</html>
