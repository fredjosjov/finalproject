<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Seller;
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
        $seller = Seller::get()->last();
        return [
            'customer_id' => $customer->id,
            'seller_id' => $seller->id,
            'totalAmount' => 0,
            'status' => 'Newly Created',
        ];
    }
}
