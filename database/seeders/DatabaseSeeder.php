<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(BooksSeeder::class);
        $this->call(FavouritesSeeder::class);
        $this->call(RatesSeeder::class);
        $this->call(PromoteTypesSeeder::class);
        $this->call(PromotesSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(OrderLinesSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
