<?php

namespace Database\Factories\Admin;

use App\Models\Admin\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'title' => $this->faker->text,
        'content' => $this->faker->text,
        'category_id' => $this->faker->randomDigitNotNull,
        'is_active' => $this->faker->randomDigitNotNull,
        'is_highlight' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
