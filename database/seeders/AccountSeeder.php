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
        $taiKhoan->Id = "Adminn";
        $taiKhoan->Name = "Admin";
        $taiKhoan->Birthday = "2001/05/26"; 
        $taiKhoan->Address = "BD"; 
        $taiKhoan->Phone= "+8438538446255";       
        $taiKhoan->Status= 1;       
        $taiKhoan->Email = "Adminn@gmail.com";
        $taiKhoan->password = Hash::make("12345678");
        $taiKhoan->Role= 1;       
        $taiKhoan->Avatar= 'avatar.jpg';       
        $taiKhoan->save();
    }
}
