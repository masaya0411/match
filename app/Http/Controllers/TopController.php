<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function __invoke()
    {
        // TOPページを表示
        if(Auth::check()) {
            return redirect('/mypage');
        }
        
        $products = Product::where('deleted_at', null)->orderBy('created_at', 'desc')->paginate(5);
        $category = new Category;
        $categories = $category->getLists();
        
        return view('top', compact('products', 'categories'));
    }
}
