<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Store;
use \App\Models\Customer;
use \App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(10)->create();
        for ($store_creation_times = 0; $store_creation_times < 3; $store_creation_times++) {
            Store::factory()->create();
            Product::factory(5)->create();

            for ($order_times = 0; $order_times < 5; $order_times++) {
                $this->call([
                    OrderSeeder::class
                ]);
            }
        }
    }


}
