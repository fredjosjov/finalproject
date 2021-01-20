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
        \App\Models\Customer::factory(10)->create();
        for ($index = 0; $index < 5; $index++) {
            \App\Models\Product::factory()->create();
            $this->call([OrderSeeder::class]);
        }
    }

    
}
