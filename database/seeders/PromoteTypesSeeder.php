<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoteTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promote_types')->DB::insert([
            [
            'Id' => 'Horror',
            'Name' => 'Kinh dị',
            'Description' => 'Tuyển tập những truyện kinh dị',
            'Status' => '1',
            ],
            
            [
            'Id' => 'New',
            'Name' => 'Sách Mới',
            'Description' => 'Sách mới ra',
            'Status' => '1',
            ],
            
            [
            'Id' => 'Popular',
            'Name' => 'Sách Phổ Biến',
            'Description' => 'Sách phổ biến nhất hiện nay',
            'Status' => '1',
            ],
            
            [
            'Id' => 'Story',
            'Name' => 'Truyện',
            'Description' => 'Truyện Tranh',
            'Status' => '1',
            ],
            ]);
    }
}
