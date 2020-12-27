<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $seller = Seller::factory()->create();
        return [
            'seller_id' => $seller->id,
            'name' => $this->faker->word,
            'visibility' => $this->faker->boolean(80)
        ];
    }
}
