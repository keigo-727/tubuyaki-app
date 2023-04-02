<x-layout title="アイコン編集 | つぶやきアプリ">
    <x-layout.single>
    @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
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
                <h2 class="text-center font-bold mb-4">現在のヘッダー</h2>
                <div class="border border-dark" style="height: 250px;">
                    <img src="{{asset($user->header_image) }}"alt="{{ $user->name }}のヘッダー画像 " style="width: 100%; height: 250px;">
                </div>
            </div> 
                <h2 class="text-center font-bold mb-4">新しいヘッダー</h2> 
                <div class="border border-dark" style="height: 250px;">
                    <div class="flex justify-center items-center bg-gray-100 border-2 border-gray-200 overflow-hidden">
                        <img id="iconPreview" src="#" alt="新しいアイコンのプレビュー" style="display:none; width: 100%; height: 250px;">
                    </div>
                </div> 
                <input type="file" name="header_image" id="header_image" onchange="previewIcon(this)" class="mt-4">
                    <p class="text-xs text-gray-600 mt-1">ファイルサイズは2MBまでにしてください</p>    
            </div>    
            <div class="flex justify-center">
            <x-element.button>
            保存する
            </x-element.button>
        </div>
            </form>
    </x-layout.single>
</x-layout>


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
