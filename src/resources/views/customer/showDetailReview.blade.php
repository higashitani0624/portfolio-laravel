@extends('layout')

@section('content')
<div class="pt-40">
<div class="w-3/5 mx-auto bg-yellow-100 p-10">
    <p class="w-4/5 mx-auto text-center">レビュー詳細</p>
    <div class="w-4/5 mx-auto">
        <div>
            <p>店名</p><span>{{ $store_name }}</span>
        </div>
        <div>
            <p>氏名</p><span>{{ $reviews->name }}</span>
        </div>
        <div>
        <?php if($reviews->gender == 0){
                            $gender = '女性';
                        }else{
                            $gender = '男性';
                        } ?>
            <p>性別</p><span>{{ $gender }}</span>
        </div>
        <div>
        <?php $pref = $reviews->age;
                        switch ($pref){
                        case 1:
                            $age = '10代以下';
                            break;
                        case 2:
                            $age = '20代';
                            break;
                        case 3:
                            $age = '30代';
                            break;
                        case 4:
                            $age = '40代';
                            break;
                        case 5:
                            $age = '50代';
                            break;
                        case 6:
                            $age = '60代以上';
                            break;
                        }?>
            <p>年代</p><span>{{ $age }}</span>
        </div>
        <div>
            <p>メールアドレス</p><span>{{ $reviews->mail }}</span>
        </div>
        <div>
            <p>メール送信可否</p><span>○</span>
        </div>
        <div>
        <?php $pref = $reviews->opinion;
                        switch ($pref){
                        case 1:
                            $opinion = '★';
                            break;
                        case 2:
                            $opinion = '★★';
                            break;
                        case 3:
                            $opinion = '★★★';
                            break;
                        case 4:
                            $opinion = '★★★★';
                            break;
                        case 5:
                            $opinion = '★★★★★';
                            break;
                        }?>
            <p>評価</p><span>{{ $opinion }}</span>
        </div>
        <div>
            <p>ご意見</p><span>{{ $reviews->review }}</span>
        </div>
        <div>
            <p>登録日時</p><span>{{ $reviews->created_at }}</span>
        </div>
    </div>
    <div class="flex text-center">
    <a class="mx-auto" href="{{route('customer.info')}}"><button class="px-20 py-5 rounded-full bg-yellow-300 text-center">レビュー確認画面</button></a>
    <form action="{{route('customer.detail',$reviews->id)}}" method="post">
        @csrf
        <button class="px-20 py-5 rounded-full bg-red-500 text-center" onclick='return confirm("削除しますか？");'>レビュー削除</button>
        <input type="hidden" value="{{$reviews->id}}" name="review_id"></input>
    </form>
    </div>
</div>
</div>
@endsection