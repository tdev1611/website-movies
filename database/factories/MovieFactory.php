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
            'title_eng' => $this->faker->unique()->name(),
            'slug' => $this->faker->unique()->slug(),
            'desc' => $this->faker->paragraph(),
            'image' => $this->faker->image('public/uploads/movies', 640, 480, null, false),
            'status' => Arr::random([1,2]),
            // 'category_id' => $this->faker->randomElement([1, 2, 3]), 
            'category_id' => $this->faker->randomElement(Category::all())['id'],
            'genre_id' => $this->faker->randomElement(Genre::all())['id'],
            'country_id' => $this->faker->randomElement(Country::all())['id'],
            
        ];
    }
}