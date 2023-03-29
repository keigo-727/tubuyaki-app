<<x-layout title="My page | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">My page</h2>
        @php
            $breadcrumbs = [
                ['href' => route('tweet.index'), 'label' => 'TOP'],
                ['href' => '#', 'label' => 'マイページ']
            ];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"></x-element.breadcrumbs>
        <div class="bg-white rounded-md shadow-lg mt-5 mb-5 p-4">
            <div class="flex flex-wrap items-center">
                <div class="flex-none mx-auto"style="position: absolute;display: flex;flex-direction:
                row-reverse;align-items: flex-start;bottom: 351px;right: 335px;">
                <a href="{{ route('mypage.userIcon.edit') }}"  >
                    <img src="{{ asset($user->user_icon) }}" alt="{{ $user->name }}'s profile picture" class="rounded-circle h-24 w-24  bg-blue-500 mb-4"style="width: 100px;height: 100px;border-radius: 50%;">
                </a>
                </div>
                <div class="flex-grow px-4" style="margin: 30px;">
                    <div class="py-4" style="display: flex;justify-content: space-between;">
                        <h1 class="text-3xl mb-5">UserName:{{ $user->name }}</h1>
                        <p class="text-gray-600 mb-5 " >ID:{{ $user->email }}</p>
                    </div>
                    <p class="text-gray-600 mb-4 text-3xl ">プロフィール:{{ $user->profile }}</p>
                    @if(Auth::check() && Auth::user()->id == $user->id)
                        <div class="flex justify-center">
                            <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" style="width: 400px; text-align: center;">プロフィールを編集する</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <x-tweet.list :tweets="$tweets"></x-tweet.list>
    </x-layout.single>
</x-layout>