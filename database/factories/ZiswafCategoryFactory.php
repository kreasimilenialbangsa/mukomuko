<?php

namespace Database\Factories\Admin;

use App\Models\Admin\ZiswafCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZiswafCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ZiswafCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'title' => $this->faker->word,
        'slug' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
