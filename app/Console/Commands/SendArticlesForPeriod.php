<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use App\Notifications\ArticlesForPeriod;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class SendArticlesForPeriod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send_articles_for_period {period}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends notifications with articles for enter period';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articles = Article::query()
            ->whereDate('created_at', '>', Carbon::now()->subDays($this->argument('period')))
            ->where('published', Article::PUPLISHED_YES)
            ->oldest()
            ->get()
        ;

        User::all()->map->notify(new ArticlesForPeriod($articles, $this->argument('period')));
    }
}
