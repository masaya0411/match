<?php

namespace App\Http\Controllers;

use App\Bord;
use App\Like;
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
        // マイページを表示
        // 登録済み案件を取得
        $user = Auth::user();
        $products = $user->products()->where('deleted_at', null)->orderBy('created_at', 'desc')->take(5)->get();
        $category = new Category;
        $categories = $category->getLists()->prepend('選択して下さい', '');


        // 応募済み案件を取得
        $apply_productsId = Bord::where('apply_user', $user->id)->select('product_id')->orderBy('created_at', 'desc')->take(5)->get();
        $apply_products = Collection::make([]);
        foreach($apply_productsId as $apply_productId) {
            $apply_products->push(Product::find($apply_productId->product_id));
        }


        // お気に入り案件を取得
        $like_productsId = $user->likes()->select('product_id')->take(5)->get();
        $like_products = Collection::make([]);
        foreach($like_productsId as $like_productId) {
            $like_products->push(Product::find($like_productId->product_id));
        }


        // パブリックメッセージを取得
        // 自分がコメントしたメッセージと商品情報を全て取得
        $my_messages = $user->public_messages()->with('product')->get();
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
        $public_messages = $public_products->unique('id')->sortByDesc('msg.created_at')->take(5);


        // DMを取得
        // ログインユーザーが関わるDMボードとメッセージを取得
        $direct_bords = Bord::where('post_user', $user->id)->orWhere('apply_user', $user->id)->with('direct_messages')->orderBy('created_at', 'desc')->take(5)->get();
        // DMパートナーの情報を取得
        foreach($direct_bords as $bord) {
            if($bord->post_user == $user->id){
                $partner_id = $bord->apply_user;
            }elseif($bord->apply_user == $user->id){
                $partner_id = $bord->post_user;
            }
            $bord->user = User::find($partner_id);
        }
        
        return view('logined.profile.mypage', compact('products', 'categories', 'public_messages', 'direct_bords', 'apply_products', 'like_products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // プロフィール詳細画面を表示
        // idが数字でなければ404ページへリダイレクト
        if(!ctype_digit($id)){
            abort(404);
        }
        // ユーザー情報を取得
        $user = User::find($id);
        // ユーザー情報がなければ404ページへリダイレクト
        if(empty($user)){
            abort(404);
        }
        // 案件情報を取得
        $products = $user->products()->get();
        // カテゴリー情報を取得
        $category = new Category;
        $categories = $category->getLists()->prepend('選択して下さい', '');

        return view('logined.profile.profDetail', compact('user', 'products', 'categories'));
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
        return view('logined.profile.profEdit', compact('user'));
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
        // 退会
        // ユーザー情報を取得
        $user = User::find($id);
        // 登録した案件の情報を取得
        $products = $user->products()->get();
        // 登録した案件の募集を全て終了する
        foreach($products as $product){
            $product->recruit_flg = 0;
            $product->save();
        }
        // ユーザー情報を論理削除
        $user->delete();
        Auth::logout();
        
        return redirect('/')->with('flash_message', '退会が完了しました。');
    }

    public function delete_confirm()
    {
        // 退会画面表示
        return view('logined.profile.withdraw');
    }

    public function register_index()
    {
        // 登録済み案件一覧表示
        $user = Auth::user();
        $products = $user->products()->where('deleted_at', null)->get();
        $category = new Category;
        $categories = $category->getLists();

        return view('logined.index.registerProduct', compact('products', 'categories'));
    }

    public function apply_index()
    {
        // 応募済み案件一覧表示
        $apply_productsId = Bord::where('apply_user', Auth::user()->id)->select('product_id')->get();
        $apply_products = Collection::make([]);
        foreach($apply_productsId as $apply_productId) {
            $apply_products->push(Product::find($apply_productId->product_id));
        }
        $category = new Category;
        $categories = $category->getLists();

        return view('logined.index.applyProduct', compact('apply_products', 'categories'));
    }

    public function like_index()
    {
        // お気に入り案件一覧表示
        $like_productsId = Auth::user()->likes()->select('product_id')->get();
        $like_products = Collection::make([]);
        foreach($like_productsId as $like_productId) {
            $like_products->push(Product::find($like_productId->product_id));
        }
        $category = new Category;
        $categories = $category->getLists();

        return view('logined.index.likeProduct', compact('like_products', 'categories'));
    }
}
