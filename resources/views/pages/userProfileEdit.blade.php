@props([
    'user'
])
<x-layout title="編集 | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            プロフィール編集ページ
        </h2>
        @php
            $breadcrumbs = [
                ['href' => route('mypage'), 'label' => 'マイページ'],
                ['href' => '#', 'label' => '編集']
            ];
        @endphp
    <div>
        <form action="{{ route('profile.edit.put')}}" method="put">
        @method('PUT')
        @csrf
        @if (session('feedback.success'))
        <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
        @endif

        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"></x-element.breadcrumbs>
    <div class="mt-1 flex-column">
        <div>Name:</div>
        <textarea
        name="name"
        rows="1"
        class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
        >{{ $name }}</textarea>
    </div>
        <div class="mt-1 flex-column">
            <div>Email:</div>
                <textarea
                name="email"
                rows="1"
                class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                >{{ $email }}</textarea>
        </div>
        <div class="mt-1 flex-column">
            <div>profile:</div>
                <textarea
                name="profile"
                rows="5"
                class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                >{{ $profile }}</textarea>
            </div>
        </div>

        @error('tweet')
        <x-alert.error>{{ $message }}</x-alert.error>
        @enderror

        <div class="flex flex-wrap justify-end">
            <x-element.button>
                変更
            </x-element.button>
        </div>
    </form>
    </x-layout.single>
</x-layout>

