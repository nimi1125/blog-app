<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = DB::table('users')->pluck('id')->toArray();
        $posts = DB::table('posts')->pluck('id')->toArray();

        return [
            'user_id' => $users[array_rand($users)],
            'post_id' => $posts[array_rand($posts)],
            'content' => $this->faker->text(50),
        ];
    }
}
