<x-layout title="アイコン編集 | つぶやきアプリ">
    <x-layout.single>
        <form method="POST" action="{{ route('mypage.userIcon.edit.update') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">アイコン変更</h2>
        @php
            $breadcrumbs = [
            ['href' => route('tweet.index'), 'label' => 'TOP'],
            ['href' => route('mypage'), 'label' => 'マイページ'],
            ['href' => '#', 'label' => '編集']];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"></x-element.breadcrumbs>
        <div class="bg-white rounded-md shadow-lg mt-5 mb-5 p-4">
            <div class="flex flex-col md:flex-row md:items-center justify-center gap-10">
                <div class="flex flex-col md:flex-row md:items-center justify-center gap-10">
                    <h2 class="text-center font-bold mb-4">現在のアイコン</h2>
                    <div class="mb-4" style="position: relative;left: 200px;">
                        <img src="{{ asset($user->user_icon) }}" alt="現在のアイコン" class=" h-48 w-48 object-cover" style="border: 1px solid #ccd6dd;width: 200px; height: 200px;">
                    </div>
                </div>
                <h2 class="text-center font-bold mb-4">新しいアイコン</h2>
                <div class="flex flex-col md:flex-row center-block gap-10  mb-4" style="width: 100%; height: 200px;" >
                    <div class="flex justify-center items-center h-48 w-48 bg-gray-100 border-2 border-gray-200"style="position: relative;left: 200px;"> 
                        <img id="iconPreview" src="#" alt="新しいアイコンのプレビュー" class=" border border-dark " style="display:none; width: 200px; height: 200px;">
                    </div>
                    <input type="file" name="user_icon" id="user_icon" onchange="previewIcon(this)" class="mt-4 center-block">
                    <p class="text-xs text-gray-600 m-4">ファイルサイズは2MBまでにしてください</p>
                    <br>
                </div>    
            </div>    
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full shadow-lg">保存する</button>
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
