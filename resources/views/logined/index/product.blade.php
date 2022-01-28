@extends('layouts.template')
@section('title', '案件一覧')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="p-mypage">
        <div class="l-content--lg">
            <h1 class="p-mypage__title">案件一覧</h1>
            
                <div class="p-mypage_wrap">

                    <!-- 検索バー -->
                    <form action="{{ route('products.search') }}" method="GET" class="c-search">
                        
                        <div class="c-search__head">
                            <h2 class="c-search__title">検索</h2>
                        </div>
                        <div class="c-search__body">
                            <input type="text" name="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" placeholder="キーワードで検索" class="c-search__keyword">

                            <select name="category_id" class="c-search__select">

                                <option value="" @if(empty($category_id)) selected @endif>
                                        選択して下さい
                                </option>

                                @foreach($categories as $id => $category_name)
                                <option value="{{ $id }}"@if($category_id == $id ) selected @endif>
                                    {{ $category_name }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="c-search__btn-wrap">
                            <button type="submit" class="c-search__btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                    </form>

                    <div class="p-mypage__block">
                        <div class="c-panel">
                            <!-- 案件パネル -->
                            <product
                                :get-products="{{ json_encode($products) }}" 
                                :get-categories="{{ json_encode($categories) }}">
                            </product>
                        </div>
                    </div>
                    {{ $products->appends(['category_id' => $category_id])->links() }}

                </div>
            
        </div>
    </div>
</main>
@endsection