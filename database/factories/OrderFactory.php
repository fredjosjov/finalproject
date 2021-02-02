<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $customer = Customer::all()->random();
        $store = Store::get()->last();
        return [
            'customer_id' => $customer->id,
            'store_id' => $store->id,
            'totalAmount' => 0,
            'status' => 'Paid',
        ];
    }
}
