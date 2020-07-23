<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
       "name"=>"Số đỏ",
       "price"=>"150000000",
       "oldprice"=>"190000000",
       "quantity"=>"20",
       "author"=>"Đỗ Trọng Phụng",
       "status"=>"Còn",
       "id_category"=>"2",
       "image"=>"public/a.png",
       "description"=>"Đây là một trong những cuốn tiểu thuyết hay nhất của Đỗ Trọng Phụng.",
   ]);
    }
}