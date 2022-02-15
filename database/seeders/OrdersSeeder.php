<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->DB::insert([
            [
            'Id' => 'BILL202201091118300001',
            'AccountId' => 'USER20220208008',
            'TotalOrder' => '207000',
            'Discount' => '0',
            'TotalMoney' => '207000',
            'StatusId' => '0',
            ],
            
            [
            'Id' => 'BILL202201091118300002',
            'AccountId' => 'USER20220208009',
            'TotalOrder' => '221000',
            'Discount' => '0',
            'TotalMoney' => '221000',
            'StatusId' => '1',
            ],
            
            [
            'Id' => 'BILL202201091134300003',
            'AccountId' => 'USER20220208010',
            'TotalOrder' => '640000',
            'Discount' => '0',
            'TotalMoney' => '640000',
            'StatusId' => '2',
            ],
            
            [
            'Id' => 'BILL202201091134300004',
            'AccountId' => 'USER20220208009',
            'TotalOrder' => '833000',
            'Discount' => '33000',
            'TotalMoney' => '800000',
            'StatusId' => '2',
            ],
            
            [
            'Id' => 'BILL202201091153240005',
            'AccountId' => 'USER20220208008',
            'TotalOrder' => '295000',
            'Discount' => '0',
            'TotalMoney' => '295000',
            'StatusId' => '3',
            ],
            ]);
    }
}
