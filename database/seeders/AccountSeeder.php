<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
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
        $taiKhoan = new Account();
        $taiKhoan->Id = "User20220208009";
        $taiKhoan->Name = "Đỗ Quang Huy";
        $taiKhoan->Birthday = "2001/05/26"; 
        $taiKhoan->Address = "BD"; 
        $taiKhoan->Phone= "+84399999999";       
        $taiKhoan->Status= 1;       
        $taiKhoan->Email = "doquanghuy2@gmail.com";
        $taiKhoan->password = Hash::make("123456789");
        $taiKhoan->Role= 1;       
        $taiKhoan->Avatar= 'avatar.jpg';       
        $taiKhoan->save();
    }
}
