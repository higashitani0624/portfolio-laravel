@extends('layout')

@section('content')
<div class="mx-auto max-w-screen-md px-5 h-full pt-40 pb-20">
    <p class="text-center text-2xl pb-10">{{$current_user->name}}へのご意見をお聞かせください!</p>
    <form action="{{route('review.input',['id' => $current_user->id])}}" method = "post" class="w-full rounded p-14 bg-yellow-100">
        @csrf
        <div class="text-xl">
            <label for="mail" class="text-xl">メール　　</label>
            <input type="text" class="form-control border-black border w-1/2 rounded" name="mail" id="mail" />
        </div>
        <div class="pt-2 text-xl">
            <label for="name" class="text-xl">氏名　　</label>
            <input type="text" class="form-control w-1/2 border-black border w-auto rounded" name="name" id="name" />
        </div>
        <div class="pt-2 text-xl">
            <label for="gender">性別　</label>
            <input type="radio" class="form-control border-black border h-4 w-6" name="gender" id="gender" value="1"/>男性
            <input type="radio" class="form-control border-black border h-4 w-6" name="gender" value="0"/>女性
        </div>
        <div class="pt-2 text-xl">
            <label for="age">年代　</label>
            <select name="age" id="age" size="1" class="border-black border w-auto rounded">
                <option value="1">10代以下</option>
                <option value="2">20代</option>
                <option value="3">30代</option>
                <option value="4">40代</option>
                <option value="5">50代</option>
                <option value="6">60代以上</option>
            </select>
        </div>
        <div class="pt-2 text-xl">
            <label for="opinion">評価　</label>
            <select name="opinion" id="age" size="1" class="border-black border w-auto rounded">
                <option value="1">★</option>
                <option value="2">★★</option>
                <option value="3">★★★</option>
                <option value="4">★★★★</option>
                <option value="5">★★★★★</option>
            </select>
        </div>
        <div class="pt-2 text-xl">
            <label for="review" class="pb-10">ご意見</label><br>
            <textarea name="review" class="w-full mt-2" rows="10">
            </textarea>
        </div>
        <div class="text-center pt-10">
            <button type="submit" class="px-16 py-5 text-white text-xl bg-yellow-500 rounded-full mx-auto">確認</button>
        </div>
    </form>
</div>
@endsection