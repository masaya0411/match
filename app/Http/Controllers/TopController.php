<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function __invoke()
    {
        // TOPページを表示
        $products = Product::where('deleted_at', null)->paginate(5);
        $category = new Category;
        $categories = $category->getLists();
        
        return view('top', compact('products', 'categories'));
    }
}
