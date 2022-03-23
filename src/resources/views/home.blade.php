@extends('layout')

@section('content')
<div class="mx-auto max-w-screen-md px-5 h-full">
    <h2 class="pt-40 w-full text-center text-2xl tracking-wider">お店一覧<h2>
    <section class="h-full w-full mt-10">
        <?php for($i = 0; $i < 4; $i++){ ?>
        <div class="h-60 mb-10 flex bg-yellow-50">
            <div class="w-2/4"><img class="w-full overflow-hidden h-auto " src="{{asset('src/assets/home-office-gc0971d6be_1920.jpg')}}"></div>
            <div class="w-2/4 py-10 pl-20">
                <h4 class="text-2xl tracking-wider">お店の名前<h4>
                <p class="text-lg mt-8 mb-5 text-gray-400 tracking-widest">評価　：<span class="pl-5">⭐️⭐️⭐️⭐️⭐️　(5.0)</span></p>
                <a class="w-full text-center text-white bg-yellow-600 py-5 px-20 rounded-full" href="#">レビューする</a>
            </div>
        </div>
        <?php } ?>
    </section>
</div>
@endsection