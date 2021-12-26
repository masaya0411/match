<?php

namespace App\Http\Controllers;

use App\Bord;
use App\User;
use App\Product;
use Carbon\Carbon;
use App\DirectMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DirectMessageRequest;

class DirectMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectMessageRequest $request, $bord_id, $partner_id)
    {
        // ダイレクトメッセージを登録
        $saveData = [
            'bord_id' => $bord_id,
            'from_user' => Auth::user()->id,
            'to_user' => $partner_id,
            'send_date' => Carbon::now(),
            'msg' => $request->msg
        ];

        $dm = new DirectMessage;
        $dm->fill($saveData)->save();

        return redirect()->route('direct.show', ['id' => $bord_id])->with('flash_message', 'メッセージを送信しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // DM詳細画面を表示
        // idが数字でない時は404ページへリダイレクト
        if(!ctype_digit($id)){
            abort(404);
        }

        // DMボードを取得
        $bord = Bord::find($id);
        // ボードに紐づくメッセージを取得
        $messages = $bord->direct_messages()->get();
        
        // パートナーと自分以外のユーザーはDM画面を見られないよう403ページへリダイレクト
        if($bord->post_user != Auth::user()->id &&  $bord->apply_user != Auth::user()->id) {
            abort(403);
        }

        // 相手のユーザーのIDを取り出す
        if($bord->post_user == Auth::user()->id) {
            $partner_id = $bord->apply_user;
        }else{
            $partner_id = $bord->post_user;
        }

        // 相手のユーザー情報を取得
        $partner_info = User::find($partner_id);
        // 案件情報を取得
        $product = Product::find($bord->product_id);
        // カテゴリー情報を取得
        $category = $product->category()->value('category_name');

        return view('logined.dm.dmDetail', compact('bord', 'messages', 'partner_info', 'product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
