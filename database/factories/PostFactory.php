<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      "title" => $this->faker->sentence(mt_rand(2, 4)),
      "slug" => $this->faker->slug(mt_rand(1, 3)),
      "excerpt" => $this->faker->sentence(mt_rand(4, 6)),
      "body" => $this->faker->sentence(mt_rand(40, 85)),
      "img" =>
        "img/posts/" .
        $this->faker->image(
          base_path("public/img/posts"),
          640,
          480,
          null,
          false,
          true
        ),
      "user_id" => mt_rand(1, 5),
      "category_id" => mt_rand(1, 3),
    ];
  }
}
