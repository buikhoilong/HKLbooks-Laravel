<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $taiKhoan = new Account();
        // $taiKhoan->Id = "ADMIN2022011011430001";
        // $taiKhoan->Name = "Đỗ Quang Huy";
        // $taiKhoan->Birthday = "2001/05/26"; 
        // $taiKhoan->Address = "BD"; 
        // $taiKhoan->Phone= "+84888888888";       
        // $taiKhoan->Status= 1;       
        // $taiKhoan->Email = "Admin12@gmail.com";
        // $taiKhoan->password = Hash::make("123456789");
        // $taiKhoan->Role= 1;       
        // $taiKhoan->Avatar= 'avatar.jpg';       
        // $taiKhoan->save();

        DB::table('users')->DB::insert([
           'name' => 'Đỗ Quang Huy',
           'email' =>'doquanghuy123@gmail',
           'password' => Hash::make('123456789') 
        ]);
    }
}
