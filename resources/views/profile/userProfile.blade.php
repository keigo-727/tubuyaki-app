<x-layout title="Edit Profile">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">Edit Profile</h2>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Name
                </label>
                <input class="form-input border-gray-500 block w-full @error('name') border-red-500 @enderror" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="profile_image">
                    Profile Image
                </label>
    </x-layout.single>
</x-layout>
