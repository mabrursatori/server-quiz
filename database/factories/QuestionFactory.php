<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'question' => $this->faker->text,
            'trueAnswer' => $this->faker->text,
            'falseAnswer1' => $this->faker->text,
            'falseAnswer2' => $this->faker->text,
            'falseAnswer3' => $this->faker->text,
            'description' => $this->faker->text,
            'quran' => $this->faker->text,
            'quranTranslate' => $this->faker->text,
            'hadits' => $this->faker->text,
            'haditsTranslate' => $this->faker->text,
            'kitab' => $this->faker->text,
            'kitabTranslate' => $this->faker->text,
            'type' => $this->faker->text,
            'mode' => $this->faker->text,
            'asset' => $this->faker->text,
        ];
    }
}
