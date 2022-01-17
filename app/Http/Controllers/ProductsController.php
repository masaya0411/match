<?php

namespace App\Http\Controllers;

use App\Bord;
use App\User;
use App\Product;
use App\Category;
use App\PublicMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 案件一覧画面を表示
        $products = Product::where('deleted_at', null)->orderBy('created_at', 'desc')->paginate(10);
        $category = new Category;
        $categories = $category->getLists();
        $category_id = 0;
        return view('logined.index.product', ['products' => $products, 'categories' => $categories, 'category_id' => $category_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 案件登録画面を表示
        $category = new Category;
        $categories = $category->getLists();

        return view('logined.products.productRegister', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // 新規案件を登録
        $product = new Product;
        Auth::user()->products()->save($product->fill($request->all()));

        return redirect('/mypage')->with('flash_message', '案件を登録しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 案件詳細画面を表示
        // idが数字でなければ404ページへリダイレクト
        if(!ctype_digit($id)){
            abort(404);
        }
        // 案件情報を取得
        $product = Product::find($id);
        // 案件がなければ404ヘリダイレクト
        if(empty($product)) {
            abort(404);
        }
        // 投稿者の情報を取得
        $post_user = $product->user()->first();
        // カテゴリーの名前を取得
        $category = $product->category()->value('category_name');
        // パブリックメッセージとそれに紐づくユーザー情報を取得
        $messages = $product->public_messages()->with('user')->get();
        // 応募者情報を取得
        $apply_usersId = Bord::where('product_id', $product->id)->select('apply_user')->get();
        // ログインユーザーが応募済みか判定
        if(Auth::check()) {
            $apply_flg = 0;
            foreach($apply_usersId as $apply_id){
                if($apply_id->apply_user == Auth::user()->id){
                    $apply_flg = 1;
                }
            }
        }else{
            $apply_flg = 0;
        }

        return view('logined.products.productDetail', compact('product', 'post_user', 'category', 'messages', 'apply_flg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 案件編集画面を表示
        if(!ctype_digit($id)){
            abort(404);
        }

        // $product = Auth::user()->products()->find($id);
        $product = Product::find($id);
        if(empty($product)) {
            abort(404);
        } elseif ($product->user_id !== Auth::user()->id) {
            abort(403);
        }
        $category = Category::find($product->category_id);

        return view('logined.products.productEdit', ['product' => $product, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        // 案件の編集内容を更新
        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message', '不正な操作が行われました。');
        }

        $product = Product::find($id);
        $product->fill($request->all())->save();

        return redirect('/mypage')->with('flash_message', '編集内容を登録しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 登録案件を論理削除
        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message', '不正な操作が行われました。');
        }

        Product::find($id)->delete();

        return redirect('/mypage')->with('flash_message', '案件を削除しました。');
    }

    public function search(Request $request)
    {
        //カテゴリー検索
        $category_id = $request->input('category_id');
        $query = Product::query();

        if(isset($category_id)) {
            $query->where('category_id', $category_id)->where('deleted_at', null);
        }
        $products = $query->orderBy('category_id', 'asc')->paginate(10);

        $category = new Category;
        $categories = $category->getLists();

        return view('logined.index.product', compact('products', 'categories', 'category_id'));
    }
}
