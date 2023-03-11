<!doctype html>
<html lang="ja">
    <link href = "{{ mix('/css/app.css') }}" rel= "stylesheet">
    <script src="{{ mix('/js/app.js') }} "></script>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width,user-scalabe=no,initial-scale=1.0,
            maximum-scale=1.0,minmum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

<x-layouts title="TOP| つぶやきアプリ">
    <x-layouts.single>
    <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8 ">
        つぶやきアプリ
    </h2>
        <x-tweet.form.post></x-tweet.form.post>
    </x-layouts.single>
</x-layouts> 

     <!-- <body>
        @auth
        <div>
            <p>投稿フォーム</p>
            @if (session('feedback.success'))
                <p style="color:green">{{session('feedback.success') }} </p>
            @endif
            <form action = "{{ route('tweet.create') }}" method ="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140文字まで</span>
            <textarea id="tweet-content" type="text" name="tweet" 
            placeholder="つぶやきを入力"  >{{ Session::has('tweet') ? Session::get('tweet') : '' ; }}</textarea>
            @error('tweet')
            <p style="color: red;"> {{ $message }} </p>
            @enderror           
            <button type="submit">投稿</button>
            </form>
        </div>
        @endauth 
        <div>
        @foreach($tweets as $tweet)
            <details>
                <summary>
                    {{ $tweet->content }} by{{$tweet->user->name}}
                </summary>
                @if(\Illuminate\Support\Facades\auth::id() === $tweet->user_id)
                <div>
                    <a href= "{{ route('tweet.update.index',['tweetId' => $tweet->id ]) }}" >編集</a>
                    <form action = "{{ route('tweet.delete',['tweetId' => $tweet->id ]) }}" method ="post">
                            @method('DELETE')    
                            @csrf
                            <button type="submit">削除</button>
                    </form>
                </div>
                @else
                    編集できません
                @endif
            </details>
        @endforeach
        </div>
    </body>
</html> -->
