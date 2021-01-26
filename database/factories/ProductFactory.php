<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $store = Store::get()->last();
        return [
            'store_id' => $store->id,
            'name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween($min = 0, $max = 100),
            'price' => $this->faker->randomFloat($nbMaxDecimals= 2, $min = 0, $max= 999),
            'description' => $this->faker->text,
            'image' => NULL
        ];
    }
}
