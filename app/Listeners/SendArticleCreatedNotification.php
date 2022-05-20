<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use App\Mail\ArticleCreated as ArticleMail;

class SendArticleCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param  ArticleCreated  $event
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
        \Mail::to($event->article->owner->email)->send(
            new ArticleMail($event->article)
        );
    }
}
