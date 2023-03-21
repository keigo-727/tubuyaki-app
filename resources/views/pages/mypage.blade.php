<x-layout title="My page | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">My page</h2>
        @php
            $breadcrumbs = [
            ['href' => route('tweet.index'), 'label' => 'TOP'],
            ['href' => '#', 'label' => 'マイページ']];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"></x-element.breadcrumbs>
            <div class="bg-white rounded-md shadow-lg mt-5 mb-5 p-4">
                <div class="flex items-center">
                    <div class="mr-4">
                    <img class="w-24 h-24 rounded-full" src="{{ asset($user->user_icon_url) }}" alt="{{ $user->name }}'s profile picture">
                    </div>
                    <div class='flex '>
                        <h1 class="text-3xl font-bold">
                            UserName: {{ $user->name }}
                        </h1>
                        <p class="text-gray-600">
                            ID:{{ $user->email }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md shadow-lg mt-5 mb-5 p-4">
                <div class="flex items-center">
                    <div class="mr-4">
                    </div>
                    <div>
                        <p class="text-gray-600">
                            プロフィール:{{ $user->profile }}
                        </p>
                    </div>
                </div>
            </div>
            @if(Auth::check() && Auth::user()->id == $user->id)
                <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full justify-content: space-between">
                    プロフィールを編集する
                </a>
            @endif
            <x-tweet.list :tweets="$tweets"></x-tweet.list>
    </x-layout.single>
</x-layout>