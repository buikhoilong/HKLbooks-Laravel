<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavouritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favourites')->DB::insert([
            [
                'Id' => '1',
                'AccountId' => 'USER20220208008',
                'BookId' => 'BOOK202112270001',
            ],

            [
                'Id' => '2',
                'AccountId' => 'USER20220208008',
                'BookId' => 'BOOK202112270002',
            ],

            [
                'Id' => '3',
                'AccountId' => 'USER20220208008',
                'BookId' => 'BOOK202112270006',
            ],

            [
                'Id' => '4',
                'AccountId' => 'USER20220208008',
                'BookId' => 'BOOK202112270007',
            ],

            [
                'Id' => '5',
                'AccountId' => 'USER20220208008',
                'BookId' => 'BOOK202112270010',
            ],

            [
                'Id' => '6',
                'AccountId' => 'USER20220208008',
                'BookId' => 'BOOK202112270011',
            ],
        ]);
    }
}
