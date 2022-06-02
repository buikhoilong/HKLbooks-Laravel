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

        // DB::table('users')->DB::insert([
        //    'name' => 'Đỗ Quang Huy',
        //    'email' =>'doquanghuy123@gmail',
        //    'password' => Hash::make('123456789') 
        // ]);

        DB::table('accounts')->insert([
            [
                'Id' => 'ADMIN20220102007',
                'Name' => 'Đỗ Quang Huy',
                'Birthday' => null,
                'Address' => 'Bình Dương',
                'Phone' => '0356251521324',
                'Status' => '1',
                'Email' => 'Adminnn@gmail.com',
                'password' => Hash::make('12345678'),
                'Role' => '0',
                'Avatar' => '241438765_405068154427447_306993794219947222_n.jpg',
            ],

            [
                'Id' => 'ADMIN2022011011430001',
                'Name' => 'Đỗ Quang Huy',
                'Birthday' => '2001-05-26',
                'Address' => 'BD',
                'Phone' => '+84888888888',
                'Status' => '1',
                'Email' => 'Admin12@gmail.com',
                'password' => Hash::make('12345678'),
                'Role' => '1',
                'Avatar' => 'avatar.jpg',
            ],

            [
                'Id' => 'ADMIN20220111005',
                'Name' => 'Đỗ Quang Huy',
                'Birthday' => '2000-11-27',
                'Address' => 'Bình Dương',
                'Phone' => '0377777777',
                'Status' => '1',
                'Email' => 'Admin1@gmail.com',
                'password' => Hash::make('12345678'),
                'Role' => '0',
                'Avatar' => 'avatar.jpg',
            ],

            [
                'Id' => 'USER20220208008',
                'Name' => 'Bùi Khởi Long',
                'Birthday' => '2001-05-26',
                'Address' => 'Sa Đéc',
                'Phone' => '+8438538446255',
                'Status' => '1',
                'Email' => 'Adminn@gmail.com',
                'password' => Hash::make('12345678'),
                'Role' => '1',
                'Avatar' => '241438765_405068154427447_306993794219947222_n.jpg',
            ],

            [
                'Id' => 'USER20220208009',
                'Name' => 'Đỗ Quang Huy',
                'Birthday' => '2001-05-26',
                'Address' => 'BD',
                'Phone' => '+84399999999',
                'Status' => '1',
                'Email' => 'doquanghuy2@gmail.com',
                'password' => Hash::make('12345678'),
                'Role' => '1',
                'Avatar' => 'avatar.jpg',
            ],

            [
                'Id' => 'USER20220208010',
                'Name' => 'Nguyễn Đăng Khoa',
                'Birthday' => '2001-05-26',
                'Address' => 'BD',
                'Phone' => '+84385386255',
                'Status' => '1',
                'Email' => 'Admin@gmail.com',
                'password' => Hash::make('12345678'),
                'Role' => '1',
                'Avatar' => 'avatar.jpg',
            ],
        ]);
    }
}
