<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [ 
        'name'=>'Bùi Hữu Hiệp',
        'email'=>'admin@gmail.com',
        'password'=>Hash::make('admin'),
        'role'=>'admin',
        'money'=>'150000',
        'phone'=>'0984253682',
        'address'=>'Mỹ Thắng, Phù Mỹ, Bình Định',]);

        DB::table('users')->insert( [
        'name'=>'Bùi Hữu Hiệp',
        'email'=>'user@gmail.com',
        'password'=>Hash::make('user'),
        'role'=>'user',
        'money'=>'1900000',
        'phone'=>'0365895211',
        'address'=>'Q1, tp.Hồ Chí Minh',]);
    }
}
