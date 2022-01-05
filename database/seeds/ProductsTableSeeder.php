<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'aaa',
            'category_id' => 1,
            'min_price' => 1,
            'max_price' => 2,
            'description' => 'aaaaaaa',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => 'bbb',
            'category_id' => 2,
            'reward' => 'kkkkk',
            'description' => 'bbbbbbb',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => 'ccc',
            'category_id' => 2,
            'reward' => 'kkkkk',
            'description' => 'cccccccc',
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 2,
            'reward' => '売り上げの3％を分配',
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 2,
            'reward' => '売り上げの3％を分配',
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 2,
            'reward' => '売り上げの3％を分配',
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 2,
            'reward' => '売り上げの3％を分配',
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 1,
            'min_price' => 30,
            'max_price' => 400,
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 1,
            'min_price' => 30,
            'max_price' => 400,
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 1,
            'min_price' => 30,
            'max_price' => 400,
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 1,
            'min_price' => 30,
            'max_price' => 400,
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'title' => '【PHP/週3日~/フルリモート】バックエンド業務案件',
            'category_id' => 1,
            'min_price' => 30,
            'max_price' => 400,
            'description' => '■担当工程（業務範囲）
            様々な業界の顧客におけるWebシステムのバックエンドシステムの開発を行って頂きます。
            
            ■働き方
            稼働スタイル：フルリモート
            稼働日数：週5日で稼働を行っていただきます。',
            'user_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
