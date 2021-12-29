<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function store($id)
    {
        // お気に入り登録
        // idが数字でなければ404ページへリダイレクト
        if(!ctype_digit($id)){
            abort(404);
        }
        $saveData = [
            'product_id' => $id,
            'user_id' => Auth::user()->id
        ];
        $like = new Like;
        $like->fill($saveData)->save();
        $result = true;

        return response()->json([
            'result' => $result
        ]);
    }

    public function destroy($id)
    {
        // お気に入り解除
        // idが数字でなければ404ページへリダイレクト
        if(!ctype_digit($id)){
            abort(404);
        }
        $like = Like::where('product_id', $id)->where('user_id', Auth::user()->id);
        $like->forceDelete();
        $result = false;

        return response()->json([
            'result' => $result
        ]);
    }

    public function haslike($id)
    {
        // お気に入り登録しているかチェック
        // idが数字でなければ404ページへリダイレクト
        if(!ctype_digit($id)){
            abort(404);
        }
        $like_flg = Like::where('product_id', $id)->where('user_id', Auth::user()->id)->exists();
        if($like_flg) {
            $result = true;
        }else{
            $result =false;
        }
        return response()->json($result);
    }
}
