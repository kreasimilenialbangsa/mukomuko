<?php

namespace Database\Factories\Admin;

use App\Models\Admin\SupportService;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupportService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'category_id' => $this->faker->randomDigitNotNull,
        'reason' => $this->faker->text,
        'nominal' => $this->faker->randomDigitNotNull,
        'is_confirm' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
