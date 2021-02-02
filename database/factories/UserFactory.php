<?php
//WARN: avoid using this class to seed the database for users--
//--instead use seller/customer factory to seed the user data.
//reason: logically user should be requested to choose--
//--between seller/customer on the account creation process.
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $autogenEmail = $this->faker->unique()->safeEmail;
        return [
            'id' => $autogenEmail,
            'email' => $autogenEmail,
            'email_verified_at' => now(),
            'password' => password_hash('123456', PASSWORD_DEFAULT), // password
            'remember_token' => Str::random(10),
        ];
    }
}
