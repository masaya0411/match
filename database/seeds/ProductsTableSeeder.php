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
    }
}
