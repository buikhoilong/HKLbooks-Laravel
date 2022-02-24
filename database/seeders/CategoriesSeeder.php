<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'Id' => 'KD',
                'Name' => 'Kinh doanh',
                'Description' => 'Sách kinh doanh là một cuốn sách viết về kinh doanh.',
                'Status' => '1',
            ],

            [
                'Id' => 'KNS',
                'Name' => 'Kỹ năng sống',
                'Description' => 'Sách kỹ năng sống là cuốn sách có nội dung truyền tải cũng như tổng hợp các kỹ năng sống cần thiết dành cho con người để người đọc có thể đối mặt với hiểm nguy mà có thể hạn chế được tối đa rủi ro liên quan đến tính mạng.',
                'Status' => '1',
            ],

            [
                'Id' => 'KT',
                'Name' => 'Kinh tế',
                'Description' => 'Sách kinh tế là một cuốn sách viết về kinh tế.',
                'Status' => '1',
            ],

            [
                'Id' => 'TH',
                'Name' => 'Toán học',
                'Description' => 'toán học hay',
                'Status' => '1',
            ],

            [
                'Id' => 'TL',
                'Name' => 'Tâm lý',
                'Description' => 'Sách tâm lý học được hiểu là những cuốn sách nghiên cứu, phân tích về các hiện tượng tâm lý hoặc tinh thần nảy sinh trong não người. Đây cũng được xem là bộ môn khoa học với quy mô nghiên cứu rộng rãi, đa dạng.',
                'Status' => '1',
            ],

            [
                'Id' => 'VT',
                'Name' => 'Viễn Tưởng Nước Ngoài',
                'Description' => 'Những câu chuyện viễn tưởng',
                'Status' => '1',
            ],
        ]);
    }
}
