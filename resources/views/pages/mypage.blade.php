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
            <div class="border border-dark" style="height: 200px;">
                <div class="flex-none float-right " >
                    <x-tweet.headerImageOptions></x-tweet.headerImageOptions>
                </div>
                <img src="{{ $user->header_image ?? asset('images/default_header.jpg') }}"
                    alt="{{ $user->name }}のヘッダー画像 " style="height: 100%;">
            </div>

            <div class="flex flex-wrap items-center">
                <div class="flex-none float-left " >
                    <a href="{{ route('mypage.userIcon.edit') }}">
                        <img src="{{ asset($user->user_icon) }}" alt="{{ $user->name }}'s profile picture" 
                        class="rounded-circle h-24 w-24 bg-blue-500 mb-4 pull-left" 
                        style="width: 100px; height: 100px; border-radius: 50%; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);">
                    </a>
                </div>
                
                <div class="flex-grow">
                    <div class="py-2 d-flex flex-column">
                        <h1 class="text-3xl">UserName:{{ $user->name }}</h1>
                        <p class="text-gray-600 ">ID:{{ $user->email }}</p>
                    </div>
                    <p class="text-gray-600 mb-4 text-3xl">{{ $user->profile }}</p>
                    @if(Auth::check() && Auth::user()->id == $user->id)
                        <div class="flex justify-center">
                            <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 
                            text-white font-bold py-2 px-4 rounded-full">プロフィールを編集する</a>
                        </div>
                    @endif
                </div>
            </div>
            <x-tweet.list :tweets="$tweets"></x-tweet.list>
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
