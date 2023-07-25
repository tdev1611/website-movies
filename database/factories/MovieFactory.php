<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Support\Arr;
class MovieFactory extends Factory
{
    protected $model = Movie::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'title' => $this->faker->unique()->name(),
            'slug' => $this->faker->unique()->slug(),
            'desc' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true, 'dogs', true, 'jpg'),
            'status' => Arr::random([1,2]),
            'category_id' => $this->faker->randomElement([1, 2, 3]), 
            'genre_id' => $this->faker->randomElement([1, 2, 3]), 
            'country_id' => $this->faker->randomElement([1])
        ];
    }
}