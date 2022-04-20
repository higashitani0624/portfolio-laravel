@extends('layout')

@section('content')
    <div class="w-4/5 mx-auto">
        <div class="pt-40">
            <form class="bg-gray-100 p-20" action="{{route('customer.info')}}" method="post">
                @csrf
                <div class="w-4/5 mx-auto text-center text-2xl">レビュー管理画面<?php if(!empty($gender))echo $gender; ?></div>
                <div class="inline-block mr-5 p-10">
                    <label for="storename" class="text-xl">氏名</label>
                    <input type="text" name="storename"></input>
                </div>
                <div class="inline-block mr-5 p-10">
                    <label for="age" class="text-xl">年代</label>
                    <select name="age" id="ages" size="1" class="border-black border w-auto rounded">
                        <option value="NULL"> </option>
                        <option value="1">10代以下</option>
                        <option value="2">20代</option>
                        <option value="3">30代</option>
                        <option value="4">40代</option>
                        <option value="5">50代</option>
                        <option value="6">60代以上</option>
                    </select>
                </div>
                <div class="inline-block mr-5 p-10">
                    <label for="gender" class="text-xl">性別</label>
                    <input type="radio" class="form-control border-black border h-4 w-6" name="gender" id="gender" value="1"/>男性
                    <input type="radio" class="form-control border-black border h-4 w-6" name="gender" value="0"/>女性
                </div>
                <div class="inline-block mr-5 p-10">
                    <label for="created" class="text-xl">登録日</label>
                    <input type="date" name="created_first"/><input type="time" name="first_time"/>~<input type="date" name="created_second"><input type="time" name="second_time"/>
                </div>
                <div class="inline-block mr-5 p-10">
                    <label for="keywords" class="text-xl">キーワード検索</label>
                    <input type="text" name="keywords"></input>
                </div>
                <div class="text-center pt-10">
                    <button type="submit" class="px-16 py-5 text-white text-xl bg-yellow-500 rounded-full mx-auto">検索</button>
                </div>
            </form>
            <table class="pt-20 bg-gray-800 border-2 w-full mt-20 border-gray-600">
                <thead>
                    <tr>
                        <th class="text-white able-fixed border-gray-600">店名</th>
                        <th class="text-white table-fixed border-gray-600">氏名</th>
                        <th class="text-white table-fixed border-gray-600">性別</th>
                        <th class="text-white table-fixed border-gray-600">年代</th>
                        <th class="text-white table-fixed border-gray-600">評価</th>
                        <th class="text-white table-fixed border-gray-600">ご意見</th>
                    </tr>
                </thead>
                @foreach($reviews as $review)
                    @if ($review != '[]')
                <tbody class="bg-gray-100">
                    <tr>
                        <td class="border-b-2 text-center border-gray-600">{{ $store_name }}</td>
                        <td class="border-b-2 text-center border-gray-600">{{ $review->name }}</td>
                        <?php if($review->gender == 0){
                            $gender = '女性';
                        }elseif($review->gender == 1){
                            $gender = '男性';
                        } ?>
                        <td class="border-b-2 text-center border-gray-600">{{ $gender }}</td>
                        <?php $pref = $review->age;
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
                        <td class="border-b-2 text-center border-gray-600">{{ $age }}</td>
                        <?php $pref = $review->opinion;
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
                        <td class="border-b-2 text-center border-gray-600">{{ $opinion }}</td>
                        <td class="border-b-2 text-center border-gray-600">{{ $review->review }}</td>
                        <td class="border-b-2 text-center border-gray-600 bg-yellow-500 text-white"><a href="{{ route('customer.detail',$review->id) }}">詳細</a></td>
                    </tr>
                </tbody>
                @else
                    <p>{{ $error_message }}</p>
                    @endif
                    @endforeach
            </table>
        </div>
    </div>
@endsection