<?php

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Shop::class, 5)
            ->create();

        $shops = \App\Shop::all();

        factory(\App\Product::class, 10)
            ->create()
            ->each(function ($product) use ($shops) {
                $product->shops()->attach(
                    $shops->random(rand(1,3))->pluck('id')->toArray()
                );
            });
    }
}
