<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesAndNewsToUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $tags = Tag::factory()->count(4)->create();

        User::factory()
            ->count(2)
            ->create()
            ->each(function (User $user) use ($tags) {
                Article::factory()
                    ->count(random_int(10, 30))
                    ->create(['owner_id' => $user->id])
                    ->each(function (Article $article) use ($tags) {
                        $article->tags()->attach(
                            $tags->random(random_int(1, 4))->pluck('id')->toArray()
                        );
                    });

                News::factory()
                    ->count(random_int(10, 30))
                    ->create(['user_id' => $user->id]);
            });
    }
}
