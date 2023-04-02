@props([
    'tweets' => []
])
<div class="bg-white rounded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach($tweets as $tweet)
        <li class="tweet-box border-b last:border-b-0 border-gray-200 p-4 flex items-start justify-between">
        
            <div>
                <div class="d-flex flex-row">
                    <img src="{{$tweet->user_icon ?? asset('storage/user_icons/default_icon.png') }}" alt="{{ $tweet->user_name }}のアイコン" class="rounded-full w-8 h-8"style="height: 50px;width: 50px;">
                    <span class="inline-block rounded-full text-gray-600 bg-gray-100 px-2 py-1 text-xs mb-2">
                    {{ $tweet->user_name }}
                    <span class="text-gray-400 text-xs">{{ $tweet->created_at_string }}</span>
                    </span>
                </div>
                <p class="text-gray-600">{!! nl2br(e($tweet->content)) !!}</p>
                <x-tweet.images :images="$tweet->images"/>
            </div>
            <div>
                <x-tweet.options :tweetId="$tweet->id" :userId="$tweet->user_id"></x-tweet.options>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<style>
    .tweet-box {
        border: 1px solid #ccd6dd;
        border-radius: 20px;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #f5f8fa;
        border-radius: 0;
        margin-bottom: 0;
    }
    
    .tweet-box img {
        margin-right: 10px;
    }
    
    .tweet-box p {
        margin-top: 10px;
        margin-bottom: 0;
    }
    
    .tweet-box .rounded-full {
        display: inline-block;
        vertical-align: middle;
        margin-right: 5px;
    }
    
    .tweet-box .text-gray-600 {
        font-size: 14px;
    }
    
    .tweet-box .text-xs {
        font-size: 12px;
        line-height: 1;
        padding: 2px 5px;
        margin-top: 5px;
    }
    
    .tweet-box + .tweet-box {
        margin-top: 0;
    }
</style>
