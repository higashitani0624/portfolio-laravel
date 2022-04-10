<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Review;

class CustomerController extends Controller
{
    //レビュー一覧表示機能
    public function showInfoTable(){
        $users = User::find(Auth::id());
        $reviews = $users->reviews()->get();
        return view('customer/show',[
            'reviews' => $reviews,
            'store_name' => $users->name,
        ]);
    }

    //レビュー詳細表示機能
    public function showDetailReview($id){
        $users = User::find(Auth::id());
        $reviews = Review::find($id);
        return view('customer/showDetailReview',[
            'reviews' => $reviews,
            'store_name' => $users->name,
        ]);
    }

    //レビュー検索機能
    public function serchInfo(Request $request){
        $name = $request->input('storename');
        $ages = $request->input('age');
        $gender = $request->input('gender');
        $created_first = $request->input('created_first');
        $first_time = $request->input('first_time');
        $created_second = $request->input('created_second');
        $second_time = $request->input('second_time');
        $keywords = $request->input('keywords');
        $users = User::find(Auth::id());
        $query = $users->reviews();

        if( !empty($name) ){
            $query->where('name','LIKE',"%{$name}%");
        }elseif(!empty($ages)){
            $query->where('age','LIKE',"%{$ages}%");
        }elseif(!empty($gender)){
            $query->where('gender','LIKE',$gender);
        }elseif(!empty($created_first)){
            $query->whereBetween('created_at','LIKE',[$created_first, $created_second]);
        }elseif(!empty($keywords)){
            $query->where('review','LIKE',$keywords);
        }
        return view('customer/show',[
            'reviews' => $query->get(),
            'store_name' => $users->name,
            'gender' => $created_first,
        ]);
    }
}
