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
                <div class="d-flex justify-content-center"style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                    <div class="" style="margin: 0px;">
                        <!-- 現在のアイコン -->
                        <h2 style="padding: 18px;">現在のアイコン</h2>
                        <img src="{{ asset($user->user_icon) }}" alt="現在のアイコン" class="rounded-circle h-24 w-24 bg-blue-500 mb-4" style="width: 240px; height: 240px;margin: 10px;">
                    </div>   
                    <div style="margin: 20px;">
                        <!-- 新しいアイコン -->
                        <h2>新しいアイコン</h2>
                        <input type="file" name="user_icon" id="user_icon" onchange="previewIcon(this)">
                        <img id="iconPreview" src="#" alt="新しいアイコンのプレビュー" style="display:none; width: 240px; height: 240px;margin: 9px 0px 0px 48px;"> 
                        
                    
                    </div>    
                </div>    
            </div>
        <button type="submit">保存する</button>
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
