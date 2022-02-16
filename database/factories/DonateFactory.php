<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Donate;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'program_id' => $this->faker->randomDigitNotNull,
        'location_id' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word,
        'email' => $this->faker->word,
        'phone' => $this->faker->word,
        'message' => $this->faker->text,
        'total_donate' => $this->faker->randomDigitNotNull,
        'is_anonim' => $this->faker->randomDigitNotNull,
        'is_confirm' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
