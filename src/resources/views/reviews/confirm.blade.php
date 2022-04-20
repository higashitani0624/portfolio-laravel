@extends('layout')

@section('content')
<div class="mx-auto max-w-screen-md px-5 h-full pt-40 pb-20">
    <p class="text-center text-2xl pb-10">{{$current_user->name}}へのご意見をご確認ください!</p>
    <form action="{{route('review.confirm',['id' => $current_user->id])}}" method = "post" class="w-full rounded p-14 bg-gray-100">
        @csrf
        <div class="text-xl">
            <p class="text-xl">メール　　</p>
            <span class="form-control">{{$confirm_info['mail']}}</span>
        </div>
        <div class="pt-2 text-xl">
            <p class="text-xl">氏名　　</p>
            <span class="form-control">{{$confirm_info['name']}}</span>
        </div>
        <div class="pt-2 text-xl">
            <p class="text-xl">性別　　</p>
            <span class="form-control">{{$confirm_info['gender']}}</span>
        </div>
        <div class="pt-2 text-xl">
            <p class="text-xl">年代　　</p>
            <span class="form-control">{{$confirm_info['age']}}</span>
        </div>
        <div class="pt-2 text-xl">
            <p class="text-xl">評価　　</p>
            <span class="form-control">{{$confirm_info['opinion']}}</span>
        </div>
        <div class="pt-2 text-xl">
            <p class="text-xl">ご意見　　</p>
            <span class="form-control">{{$confirm_info['review']}}</span>
        </div>
        <div class="text-center pt-10">
            <button type="submit" class="px-16 py-5 text-white text-xl bg-yellow-500 rounded-full mx-auto">送信</button>
        </div>
    </form>
</div>
@endsection