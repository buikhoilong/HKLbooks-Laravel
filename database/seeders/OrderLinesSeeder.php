<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderLinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_lines')->DB::insert([
            [
                'Id' => '1',
                'OrderId' => 'BILL202201091118300001',
                'BookId' => 'BOOK202112270001',
                'Quantity' => '3',
                'Status' => '',
            ],

            [
                'Id' => '2',
                'OrderId' => 'BILL202201091118300001',
                'BookId' => 'BOOK202112270002',
                'Quantity' => '2',
                'Status' => '',
            ],

            [
                'Id' => '3',
                'OrderId' => 'BILL202201091118300002',
                'BookId' => 'BOOK202112270003',
                'Quantity' => '4',
                'Status' => '',
            ],

            [
                'Id' => '4',
                'OrderId' => 'BILL202201091118300002',
                'BookId' => 'BOOK202112270004',
                'Quantity' => '3',
                'Status' => '',
            ],

            [
                'Id' => '5',
                'OrderId' => 'BILL202201091134300003',
                'BookId' => 'BOOK202112270005',
                'Quantity' => '4',
                'Status' => '',
            ],

            [
                'Id' => '6',
                'OrderId' => 'BILL202201091134300003',
                'BookId' => 'BOOK202112270006',
                'Quantity' => '2',
                'Status' => '',
            ],

            [
                'Id' => '7',
                'OrderId' => 'BILL202201091134300003',
                'BookId' => 'BOOK202112270007',
                'Quantity' => '3',
                'Status' => '',
            ],

            [
                'Id' => '8',
                'OrderId' => 'BILL202201091134300004',
                'BookId' => 'BOOK202112270008',
                'Quantity' => '10',
                'Status' => '',
            ],

            [
                'Id' => '9',
                'OrderId' => 'BILL202201091134300004',
                'BookId' => 'BOOK202112270009',
                'Quantity' => '1',
                'Status' => '',
            ],

            [
                'Id' => '10',
                'OrderId' => 'BILL202201091134300004',
                'BookId' => 'BOOK202112270010',
                'Quantity' => '3',
                'Status' => '',
            ],

            [
                'Id' => '11',
                'OrderId' => 'BILL202201091134300004',
                'BookId' => 'BOOK202112270011',
                'Quantity' => '1',
                'Status' => '',
            ],

            [
                'Id' => '12',
                'OrderId' => 'BILL202201091153240005',
                'BookId' => 'BOOK202112270002',
                'Quantity' => '2',
                'Status' => '',
            ],

            [
                'Id' => '13',
                'OrderId' => 'BILL202201091153240005',
                'BookId' => 'BOOK202112270003',
                'Quantity' => '2',
                'Status' => '',
            ],

            [
                'Id' => '14',
                'OrderId' => 'BILL202201091153240005',
                'BookId' => 'BOOK202112270004',
                'Quantity' => '5',
                'Status' => '',
            ],
        ]);
    }
}
