<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\PublicMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PublicMessageRequest;

class PublicMessagesController extends Controller
{
    public function index()
    {
        // パブリックメッセージ一覧表示
        // 自分がコメントしたメッセージと商品情報を全て取得
        $my_messages = Auth::user()->public_messages()->with('product')->get();
        // 自分がコメントした商品の情報をコレクションに追加
        $public_products = Collection::make([]);
        foreach($my_messages as $my_message) {
            $public_products->push($my_message->product);
        }
        // msgに最新のパブリックメッセージを一件追加
        foreach($public_products as $public_product) {
            $public_product->msg = PublicMessage::where('product_id', $public_product->id)->orderBy('created_at', 'desc')->first();
        }
        // 同じ商品で複数コメントしている場合があるので、かぶりをなくし、新着順に並び替える
        $public_messages = $public_products->unique('id')->sortByDesc('msg.created_at');

        return view('logined.index.public', compact('public_messages'));
    }

    public function store(PublicMessageRequest $request, $p_id)
    {
        // パブリックメッセージを登録
        $saveData = [
            'product_id' => $p_id,
            'user_id' => Auth::user()->id,
            'send_date' => Carbon::now(),
            'public_msg' => $request->public_msg,
        ];

        $public_msg = new PublicMessage;
        $public_msg->fill($saveData)->save();

        return redirect()->route('products.show', ['id' => $p_id])->with('flash_message', 'メッセージを送信しました。');
    }
}
