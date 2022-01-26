@extends('layouts.template')
@section('title', '案件登録')

@section('content')

<main class="l-main u-bg-color--gray">
    <div class="l-project">
        <div class="l-content--md">
            <form action="{{ route('products.store') }}" method="POST" class="p-product-register">
                @csrf

                <div class="c-form">
                    <h1 class="p-product-register__heading">案件を登録する</h1>

                    <div class="c-form__list js-countUp">
                        <p class="c-form__head">
                            案件名
                            <span class="c-form__head__icon c-form__head__icon--required">必須</span>
                        </p>
                        <input type="text" name="title" class="c-form__input @error('title') is-error @enderror" placeholder="案件名" value="{{ old('title') }}" required="required">
                        <div data-count="30" class="c-form__count js-countText">
                            <span>0 / 30</span>
                        </div>

                        @error('title')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="c-form__list">
                        <p class="c-form__head">
                            案件種類
                            <span class="c-form__head__icon c-form__head__icon--required">必須</span>    
                        </p>
                        <select name="category_id" class="c-form__select js-projectSelect @error('category_id') is-error @enderror" required="required">
                            @foreach($categories as $id => $category_name)
                                <option value="{{ $id }}" @if(old('category_id')==$id) selected @endif>{{ $category_name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div id="status1" class="c-form__list js-projectSelectHide" style="display: none;">
                        <p class="c-form__head">
                            金額
                            <span class="c-form__head__icon c-form__head__icon--required">必須</span>
                        </p>
                        <div class="c-form__col">
                            <p class="c-form__col__head">
                                下限：
                            </p>
                            <div class="c-form__col__body">
                                <input type="text" name="min_price" class="c-form__input c-form__input--sm @error('min_price') is-error @enderror" value="{{ old('min_price') }}" placeholder="1" required="required" disabled>
                                <p class="c-form__col__body__unit">,000円〜</p>
                            </div>
                        </div>
                        <div class="c-form__col">
                            <p class="c-form__col__head">
                                上限：
                            </p>
                            <div class="c-form__col__body">
                                <input type="text" name="max_price" class="c-form__input c-form__input--sm @error('max_price') is-error @enderror" value="{{ old('max_price') }}" placeholder="20" required="required" disabled>
                                <p class="c-form__col__body__unit">,000円</p>
                            </div>
                        </div>

                        @error('min_price')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('max_price')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div id="status2" class="c-form__list js-countUp js-projectSelectHide" style="display: none;">
                        <p class="c-form__head">報酬内容
                            <span class="c-form__head__icon c-form__head__icon--required">必須</span>
                        </p>
                        <input type="text" name="reward" value="{{ old('reward') }}" class="c-form__input @error('reward') is-error @enderror" placeholder="収益の5%" required="required" disabled>
                        <div data-count="50" class="c-form__count js-countText">
                            <span>0 / 50</span>
                        </div>

                        @error('reward')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="c-form__list js-countUp">
                        <p class="c-form__head">
                            内容
                            <span class="c-form__head__icon c-form__head__icon--required">必須</span>
                        </p>
                        <textarea name="description" cols="30" rows="10" class="c-form__textarea @error('description') is-error @enderror" placeholder="案件内容" required="required">{{ old('description') }}</textarea>
                        <div data-count="5000" class="c-form__count js-countText">
                            <span>0 / 5000</span>
                        </div>

                        @error('description')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="p-product-register__btn">
                        <button type="submit" class="c-btn u-m-auto ">登録する</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</main>
@endsection