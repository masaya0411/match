<?php

namespace App\Http\Controllers;

use App\Bord;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use App\Mail\ApplyNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BordsController extends Controller
{
    public function store($u_id, $p_id)
    {
        // DMボードを新規作成
        $post_user = User::find($u_id);
        $apply_user = Auth::user();
        $product = Product::find($p_id);

        $bordSaveData = [
            'post_user' => $post_user->id,
            'apply_user' => $apply_user->id,
            'product_id' => $p_id
        ];

        $dm_bord = new Bord;
        $dm_bord->fill($bordSaveData)->save();

        // 応募時にお知らせメールを送信
        Mail::to($post_user->email)->send(new ApplyNotification($post_user, $apply_user, $product));
        
        return redirect()->route('direct.show', ['id' => $dm_bord->id])->with('flash_message', '案件に応募しました。');
    }
}
