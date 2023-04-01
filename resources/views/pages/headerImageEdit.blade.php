<x-layout title="アイコン編集 | つぶやきアプリ">
    <x-layout.single>
        <form method="POST" action="{{ route('mypage.headerImage.update') }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @if (session('feedback.success'))
        <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
        @endif
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">トップ画像の変更</h2>
        @php
            $breadcrumbs = [
            ['href' => route('tweet.index'), 'label' => 'TOP'],
            ['href' => route('mypage'), 'label' => 'マイページ'],
            ['href' => '#', 'label' => '編集']];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"></x-element.breadcrumbs>
        <div class="bg-white rounded-md shadow-lg mt-5 mb-5 p-4">
            <div class="flex flex-col md:flex-row md:items-center justify-center gap-10">
                    <h2 class="text-center font-bold mb-4">現在のアイコン</h2>
                    <div class="border border-dark" style="height: 200px;">
                        <img src="{{ $user->header_image ?? asset('images/default_header.jpg') }}"alt="{{ $user->name }}のヘッダー画像 " style="height: 200px;">
                    </div>
                </div>  
                <h2 class="text-center font-bold mb-4">新しいアイコン</h2> 
                <div class="border border-dark" style="height: 200px;">
                    <div class="flex justify-center items-center bg-gray-100 border-2 border-gray-200 overflow-hidden">
                        <img id="iconPreview" src="#" alt="新しいアイコンのプレビュー" style="display:none; width: 100%; height: 200px;">
                    </div>
                </div> 
                <input type="file" name="header_image" id="user_icon" onchange="previewIcon(this)" class="mt-4">
                    <p class="text-xs text-gray-600 mt-1">ファイルサイズは2MBまでにしてください</p>    
            </div>    
            <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full shadow-lg">保存する</button>
        </div>
        </div>
    </x-layout.single>
</x-layout>
</form>

<!-- アイコンプレビュー用のJavaScript -->
<script>
    function previewIcon(input) {
        var preview = document.getElementById('iconPreview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.setAttribute('src', e.target.result);
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
