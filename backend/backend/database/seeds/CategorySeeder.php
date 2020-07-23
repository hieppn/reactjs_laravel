<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name'=>'Truyện cười']);
        DB::table('categories')->insert(['name'=>'Tiểu thuyết']);
        DB::table('categories')->insert(['name'=>'Truyện']);
        DB::table('categories')->insert(['name'=>'Tập chí']);
    }
}
