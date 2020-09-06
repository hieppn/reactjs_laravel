<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('books')->insert([
       "name"=>"Chi Dau",
       "price"=>"14000000",
       "oldprice"=>"19000000",
       "quantity"=>"20",
       "author"=>"Đỗ Trọn",
       "status"=>"Còn",
       "id_category"=>"1",
       "image"=>"public/a.png",
       "description"=>"Đây là một trong những cuốn tiểu thuyết hay nhất của Đỗ Trọng Phụng.",
   ]);

   DB::table('books')->insert([
    "name"=>"Chi Hai",
    "price"=>"1500000",
    "oldprice"=>"1900000",
    "quantity"=>"20",
    "author"=>"Đỗ Trọng Phụng",
    "status"=>"Còn",
    "id_category"=>"3",
    "image"=>"public/b.jpg",
    "description"=>"abc",
]);

DB::table('books')->insert([
    "name"=>"Tat Den",
    "price"=>"150000000",
    "oldprice"=>"190000000",
    "quantity"=>"20",
    "author"=>"Đỗ Trọng Phụng",
    "status"=>"Còn",
    "id_category"=>"2",
    "image"=>"public/b.jpg",
    "description"=>"Đây là một trong những cuốn tiểu thuyết hay nhất của Đỗ Trọng Phụng.",
]);


DB::table('books')->insert([
    "name"=>"Doremon",
    "price"=>"150000000",
    "oldprice"=>"190000000",
    "quantity"=>"20",
    "author"=>"Đỗ Trọng Phụng",
    "status"=>"Còn",
    "id_category"=>"1",
    "image"=>"public/b.jpg",
    "description"=>"Đây là một trong những cuốn tiểu thuyết hay nhất của Đỗ Trọng Phụng.",
]);


DB::table('books')->insert([
    "name"=>"Nhat ky",
    "price"=>"150000000",
    "oldprice"=>"190000000",
    "quantity"=>"20",
    "author"=>"Đỗ Trọng Phụng",
    "status"=>"Còn",
    "id_category"=>"3",
    "image"=>"public/b.jpg",
    "description"=>"Đây là một trong những cuốn tiểu thuyết hay nhất của Đỗ Trọng Phụng.",
]);


DB::table('books')->insert([
    "name"=>"Nhat ali",
    "price"=>"150000000",
    "oldprice"=>"190000000",
    "quantity"=>"20",
    "author"=>"Đỗ Trọng Phụng",
    "status"=>"Còn",
    "id_category"=>"2",
    "image"=>"public/a.png",
    "description"=>"Đây là một trong những cuốn tiểu thuyết hay nhất của Đỗ Trọng Phụng.",
]);

DB::table('books')->insert([
    "name"=>"Alibaba",
    "price"=>"150000000",
    "oldprice"=>"190000000",
    "quantity"=>"20",
    "author"=>"Đỗ Trọng Phụng",
    "status"=>"Còn",
    "id_category"=>"1",
    "image"=>"public/b.jpg",
    "description"=>"Đây là một trong những cuốn tiểu thuyết hay nhất của Đỗ Trọng Phụng.",
]);

DB::table('books')->insert([
    "name"=>"Abc",
    "price"=>"150000000",
    "oldprice"=>"190000000",
    "quantity"=>"20",
    "author"=>"Đỗ Trọng Phụng",
    "status"=>"Còn",
    "id_category"=>"3",
    "image"=>"public/a.png",
    "description"=>"Đây là một trong những cuốn tiểu thuyết hay nhất của Đỗ Trọng Phụng.",
]);
    }
}