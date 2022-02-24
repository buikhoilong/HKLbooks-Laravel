<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            [
                'Id' => '1',
                'AccountId' => 'USER20220208009',
                'BookId' => 'BOOK202112270001',
                'Star' => '5',
                'Comment' => 'Sách rất chất lượng và hay',
                'Reply' => 'Cảm ơn bạn!',
                'Status' => '1',
            ],

            [
                'Id' => '2',
                'AccountId' => 'USER20220208009',
                'BookId' => 'BOOK202112270006',
                'Star' => '4',
                'Comment' => 'Sách khá hay, nhưng,giao hàng chậm',
                'Reply' => 'Cảm ơn bạn đã đóng góp ý kiến',
                'Status' => '1',
            ],

            [
                'Id' => '3',
                'AccountId' => 'USER20220208008',
                'BookId' => 'BOOK202112270010',
                'Star' => '4',
                'Comment' => 'OK',
                'Reply' => null,
                'Status' => '0',
            ],

            [
                'Id' => '4',
                'AccountId' => 'USER20220208009',
                'BookId' => 'BOOK202112270005',
                'Star' => '1',
                'Comment' => 'OK',
                'Reply' => 'OK',
                'Status' => '1',
            ],

            [
                'Id' => '5',
                'AccountId' => 'USER20220208009',
                'BookId' => 'BOOK202112270007',
                'Star' => '5',
                'Comment' => 'OKkkkkkkkkkk',
                'Reply' => 'Okla',
                'Status' => '1',
            ],

            [
                'Id' => '6',
                'AccountId' => 'USER20220208010',
                'BookId' => 'BOOK202112270011',
                'Star' => '2',
                'Comment' => 'OK',
                'Reply' => 'OK',
                'Status' => '1',
            ],

            [
                'Id' => '7',
                'AccountId' => 'USER20220208010',
                'BookId' => 'BOOK202112270005',
                'Star' => '1',
                'Comment' => 'OK',
                'Reply' => 'OK',
                'Status' => '1',
            ],
        ]);
    }
}
