<?php

use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert(['code'=>'hiepga','percent'=>50,'quantity'=>3]);
        DB::table('discounts')->insert(['code'=>'hiepgaa','percent'=>55,'quantity'=>3]);
         DB::table('discounts')->insert(['code'=>'hiepgab','percent'=>100,'quantity'=>1]);
          DB::table('discounts')->insert(['code'=>'hiepgac','percent'=>40,'quantity'=>3]);
    }
}
