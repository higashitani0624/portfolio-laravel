<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;

class ReviewController extends Controller
{
    public function showInputForm(int $id){
        $current_user = User::find($id);
        return view('reviews/input',['current_user' => $current_user,]);
    }

    public function inputSession(Request $request,int $id){
        session()->put('mail', $request->get('mail'));
        session()->put('name', $request->get('name'));
        session()->put('gender', $request->get('gender'));
        session()->put('age', $request->get('age'));
        session()->put('opinion', $request->get('opinion'));
        session()->put('review', $request->get('review'));
        return redirect()->route('review.confirm', ['id' => $id]);
    }

    public function showConfirmForm(int $id){
        $current_user = User::find($id);
        $user_info = array(//セッション変数受け取る
            'mail'=>session()->get('mail'),
            'name'=>session()->get('name'),
            'gender'=>session()->get('gender'),
            'age'=>session()->get('age'),
            'opinion'=>session()->get('opinion'),
            'review'=>session()->get('review')
        );
        $confirm_info = array(//session変数を加工
            'mail'=>$user_info['mail'],
            'name'=>$user_info['name'],
            'gender'=>NULL,
            'age'=>NULL,
            'opinion'=>NULL,
            'review'=>$user_info['review'],
        );
        //性別
        if($user_info['gender'] == 0){
            $confirm_info['gender'] = '女性';
        
        }else{
            $confirm_info['gender'] = '男性';
        }
        //年代
        $pref = $user_info['age'];
        switch ($pref){
            case 1:
                $confirm_info['age'] = '10代以下';
                break;
            case 2:
                $confirm_info['age'] = '20代';
                break;
            case 3:
                $confirm_info['age'] = '30代';
                break;
            case 4:
                $confirm_info['age'] = '40代';
                break;
            case 5:
                $confirm_info['age'] = '50代';
                break;
            case 6:
                $confirm_info['age'] = '60代以上';
                break;
        }
        //評価
        $pref = $user_info['opinion'];
        switch ($pref){
            case 1:
                $confirm_info['opinion'] = '★';
                break;
            case 2:
                $confirm_info['opinion'] = '★★';
                break;
            case 3:
                $confirm_info['opinion'] = '★★★';
                break;
            case 4:
                $confirm_info['opinion'] = '★★★★';
                break;
            case 5:
                $confirm_info['opinion'] = '★★★★★';
                break;
        }
        return view('reviews/confirm',[
            'current_user' => $current_user,
            'confirm_info' => $confirm_info,
        ]);
    }

    public function inputConfirm(int $id){
        $now_user = User::find($id);

        $review = new Review();
        $review -> name = session()->get('name');
        $review -> mail = session()->get('mail');
        $review -> gender = session()->get('gender');
        $review -> age = session()->get('age');
        $review -> review = session()->get('review');
        $review -> opinion = session()->get('opinion');
        $review -> user_id = $id;

        $now_user->reviews()->save($review);
        return redirect()->route('review.end');
    }

    public function endConfirm(){
        return view('reviews/confirm_end');
    }
}
