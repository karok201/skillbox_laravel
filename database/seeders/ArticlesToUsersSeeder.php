<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesToUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory()->count(4)->create();

        User::factory()
            ->count(2)
            ->create()
            ->each(function (User $user) use ($tags) {
                Article::factory()
                    ->count(rand(10, 30))
                    ->create(['owner_id' => $user->id])
                    ->each(function (Article $article) use ($tags) {
                        $article->tags()->attach(
                            $tags->random(rand(1,4))->pluck('id')->toArray()
                        );
                    });
            });
    }
}
