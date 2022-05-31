@extends('layout')

@section('content')
<div class="mx-auto max-w-screen-md px-5 h-full">
    <h2 class="pt-40 w-full text-center text-2xl tracking-wider">お店一覧<h2>
    <section class="h-full w-full mt-10">
        @foreach($users as $user)
        <div class="h-60 mb-10 flex bg-gray-100">
            <div class="w-2/4"><img class="w-full h-auto" src="{{ asset('img/home-office-gc0971d6be_1920.jpg')}}"></div>
            <div class="w-2/4 py-10 pl-20">
                <h4 class="text-2xl tracking-wider">{{$user->name}}<h4>
                <p class="text-lg mt-8 mb-5 text-gray-400 tracking-widest">評価　：<span class="pl-5">⭐️⭐️⭐️⭐️⭐️　(5.0)</span></p>
                <a class="w-full text-center text-white bg-yellow-500 py-5 px-16 rounded-full" href="{{route('review.input',['id' => $user->id])}}">レビューする</a>
            </div>
        </div>
        @endforeach
        {{ $users -> links() }}
    </section>
</div>
@endsection
