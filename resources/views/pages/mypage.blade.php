<x-layout title="My page | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">My page</h2>
        @php
            $breadcrumbs = [
                ['href' => route('tweet.index'), 'label' => 'TOP'],
                ['href' => '#', 'label' => 'マイページ']
            ];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"></x-element.breadcrumbs>
        <div class="bg-white rounded-md shadow-lg mt-5 mb-5 p-4" style="position: relative;">
                <div class="float-right "style="position: relative; top: 26px;z-index: 2147483647;" >
                    <x-tweet.headerImageOptions></x-tweet.headerImageOptions>
                </div>
            <div class="border border-dark" style="height: 250px;">
                <img src="{{ $user->header_image ?? asset('storage/header_image/default_header_image.png') }}"
                    alt="{{ $user->name }}のヘッダー画像 " style="height: 100%;width: 100%;position: relative;top: -19px;">
            </div>
                <div class="flex-none float-left " >
                    <a href="{{ route('mypage.userIcon.edit') }}">
                        <img src="{{ asset($user->user_icon) }}" alt="{{ $user->name }}'s profile picture" 
                        class="rounded-circle h-24 w-24 bg-blue-500 mb-4 pull-left" 
                        style="width: 130px;height: 130px;border-radius: 50%;box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
                        position: relative;bottom: 65px;left: 30px;margin-bottom: -60px;">
                    </a>
                </div>
                    @if(Auth::check() && Auth::user()->id == $user->id)
                    <div class="float-right "style="position: relative; top: 26px;z-index: 2147483647;" >
                        <x-tweet.profileEdit></x-tweet.profileEdit>
                    </div>
                    @endif 
            <div class="flex flex-wrap items-center">
                <div class="flex-grow">
                    <div class="py-2 d-flex flex-column" style="position: relative;">
                        <h1 class="text-3xl">UserName:{{ $user->name }}</h1>
                        <p class="text-gray-600 ">ID:{{ $user->email }}</p>
                    </div>
                    <p class="text-gray-600 mb-4 text-3xl">{{ $user->profile }}</p>
                    
                </div>
            </div>
            @props([
    'tweets' => []
])
<div class="bg-white rounded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach($tweets as $tweet)
        <li class="tweet-box border-b last:border-b-0 border-gray-200 p-4 flex items-start justify-between">
            <div>
                <div class="d-flex flex-row">
                <img src="{{$user->user_icon ?? asset('storage/user_icons/default_icon.png') }}"
                alt="{{ $tweet->user_name }}のアイコン" class="rounded-full w-8 h-8"style="height: 50px;width: 50px;">
                    <span class="inline-block rounded-full text-gray-600 bg-gray-100 px-2 py-1 text-xs mb-2">
                    {{ $user->name }}
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

        </div>
    </x-layout.single>
</x-layout>

<style>
    .rounded-circle {
        border-radius: 50%;
    }

    .text-blue-500 {
        color: #1DA1F2;
    }

    .bg-blue-500 {
        background-color: #1DA1F2;
    }

    .text-gray-600 {
        color: #657786;
    }

    .hover\:bg-blue-700:hover {
        background-color: #0C86E4;
    }
</style>
