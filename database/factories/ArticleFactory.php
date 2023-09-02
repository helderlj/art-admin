<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'authors' => $this->faker->title() . $this->faker->name(),
            'available_at' => $this->faker->url(),
            'subtitle' => $this->faker->text(200),
            'category_id' => Category::inRandomOrder()->first(),
            'file_path' => $this->faker->word(),
            'cover_path' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }


}
