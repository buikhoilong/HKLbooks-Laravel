<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            [
                'Id' => '0',
                'Name' => 'Đang xử lý',
                'Description' => 'Đơn hàng đang được xử lý, vui lòng đợi',
            ],

            [
                'Id' => '1',
                'Name' => 'Đang vận chuyển',
                'Description' => 'Đơn hàng đang được vân chuyển, hàng sẽ tới trong ít ngày',
            ],

            [
                'Id' => '2',
                'Name' => 'Đã giao',
                'Description' => 'Đơn hàng đã được giao thành công, xin hãy đánh giá sản phẩm',
            ],
            
            [
                'Id' => '3',
                'Name' => 'Đã hủy',
                'Description' => 'Đơn hàng đã bị hủy',
            ],
        ]);
    }
}
