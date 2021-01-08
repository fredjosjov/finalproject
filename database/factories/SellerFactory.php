<?php

namespace Database\Factories;

use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->make();
        User::factory()->create([
            'id' => $user->id,
            'password' => $user->password,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'updated_at' => now(),
            'created_at' => now()
        ]);
        $income = 0;
        $expense = 0;
        return [
            'user_id' => $user->id,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'income' => $income,
            'expense' => $expense,
            'profit' => $income - $expense
        ];
    }
}
