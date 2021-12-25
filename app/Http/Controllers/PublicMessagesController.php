<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\PublicMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PublicMessageRequest;

class PublicMessagesController extends Controller
{
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
