<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
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
        $products = Product::where('deleted_at', null)->get();
        $category = new Category;
        $categories = $category->getLists()->prepend('選択して下さい', '');

        return view('logined.products.product', ['products' => $products, 'categories' => $categories]);
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
        $categories = $category->getLists()->prepend('選択して下さい', '');

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
        if(!ctype_digit($id)){
            return redirect('errors.404');
        }

        $product = Auth::user()->products()->find($id);
        $category = Category::find($product->category_id);

        return view('logined.products.productDetail', ['product' => $product, 'category' => $category]);
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
            return redirect('errors.404');
        }

        $product = Auth::user()->products()->find($id);
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
}
