<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = DB::table('users')->pluck('id')->toArray();
        $categories = DB::table('categories')->pluck('id')->toArray();

        return [
            'user_id' => $users[array_rand($users)],
            'category_id' => $categories[array_rand($categories)],
            'title' => $this->faker->sentence(10),
            'content' => $this->faker->text(100),
            'image_path' => 'https://picsum.photos/200/300',
        ];
    }
}