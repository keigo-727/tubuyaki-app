
@props([
    'users' => []
])
<div class="bg-white rounded-md shadow-lg mt-5 mb-5 p-4">
        <div class="flex items-center">
                <div class="mr-4">
                <img class="w-24 h-24 rounded-full" src="{{ $user->user_icon_url }}" alt="{{ $user->name }}'s profile picture">
        </div>
        <div>
            <h1 class="text-3xl font-bold">UserName: {{ $user->name }}</h1><p class="text-gray-600">ID:{{ $user->email }}</p>
            <p class="text-gray-600">プロフィール:{{ $user->profile }}</p>
        </div>
</div>


