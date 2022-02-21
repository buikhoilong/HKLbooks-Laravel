<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotes')->DB::insert([
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270001',
            ],
            
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270003',
            ],
            
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270008',
            ],
            
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270010',
            ],
            
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270004',
            ],
            
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270009',
            ],
            
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270007',
            ],
            
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270002',
            ],
            
            [
            'PromoteId' => 'Popular',
            'BookId' => 'BOOK202112270002',
            ],
            
            [
            'PromoteId' => 'Story',
            'BookId' => 'BOOK202112270002',
            ],
            
            [
            'PromoteId' => 'New',
            'BookId' => 'BOOK202112270005',
            ],
            
            [
            'PromoteId' => 'Popular',
            'BookId' => 'BOOK202112270005',
            ],
            ]);
    }
}
