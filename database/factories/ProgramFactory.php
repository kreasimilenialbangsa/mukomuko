<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Program::class;

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
        'location' => $this->faker->word,
        'target_dana' => $this->faker->randomDigitNotNull,
        'end_date' => $this->faker->word,
        'category_id' => $this->faker->randomDigitNotNull,
        'description' => $this->faker->text,
        'image' => $this->faker->text,
        'is_active' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
