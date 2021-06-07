<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => Arr::random(['Technology', 'Society', 'Health', 'Science']),
            'title' => $this->faker->realText(30, 2),
            'slug' => Str::of($this->faker->realText(30, 2))->slug('-'),
            'body' => $this->faker->realText(2000, 5),
        ];
    }
}
