@extends('baseLayout.base')

@section('title', '登録画面')

@section('main')
<div class="mt-3 flex justify-center items-center flex-col">
    @if ($errors->any())
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="font-bold">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data" class="p-2 w-96 bg-teal-500 text-purple-50 block">
        @csrf
        <div class="grid grid-flow-col grid-cols-3 gap-4">
            <label for="name" class="col-span-1 text-right font-medium">名前</label>
            <input type="text" name="name" id="name" class="col-span-2 border border-gray-800 text-gray-950">
        </div>
        <div class="mt-2 grid grid-flow-col grid-cols-3 gap-4">
            <label for="email" class="col-span-1 text-right font-medium">メールアドレス</label>
            <input type="text" name="email" id="email" class="col-span-2 border border-gray-800 text-gray-950">
        </div>
        <div class="mt-2 grid grid-flow-col grid-cols-3 gap-4">
            <label for="password" class="col-span-1 text-right font-medium">パスワード</label>
            <input type="password" name="password" id="password" class="col-span-2 border border-gray-800 text-gray-950">
        </div>
        <div class="mt-2 grid grid-flow-col grid-cols-3 gap-4">
            <label for="profImage" class="col-span-1 text-right font-medium">アカウント画像</label>
            <input type="file" name="profImage" id="profImage" class="col-span-2 border border-gray-800 text-gray-950">
        </div>
        <div class="mt-2 grid grid-flow-col grid-cols-3 gap-4">
            <button type="submit" class="col-span-3 border border-gray-800 bg-gray-800">登録する</button>
        </div>
    </form>
</div>
@endsection