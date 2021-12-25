<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Category;
use App\PublicMessage;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // マイページを表示
        $user = Auth::user();
        $products = $user->products()->where('deleted_at', null)->get();
        $category = new Category;
        $categories = $category->getLists()->prepend('選択して下さい', '');

        // 自分がコメントしたパブリックメッセージを一件表示
        $my_messages = $user->public_messages()->with('product')->get();
        
        $public_products = Collection::make([]);
        foreach($my_messages as $my_message) {
            $public_products->push($my_message->product);
        }
        foreach($public_products as $public_product) {
            $public_product->msg = PublicMessage::where('product_id', $public_product->id)->orderBy('created_at', 'desc')->first();
        }
        $public_messages = $public_products->unique('id');
        
        return view('logined.mypage', compact('products', 'categories', 'public_messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //プロフィール編集画面を表示
        $user = Auth::user();
        return view('logined.profEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        // プロフィールを更新
        $user = User::find($id);
        $user->name = $request->name;
        $user->introduction = $request->introduction;

        if(!empty($request->pic)){
            $fileType = $request->pic->getClientOriginalName();
            $filepath = $request->pic->storeAs('public/profile_images', Auth::id().date("YmdHis").$fileType);
            $user->pic = basename($filepath);
        }

        $user->save();

        return redirect('/mypage/edit')->with('flash_message', 'プロフィールを更新しました。');
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
