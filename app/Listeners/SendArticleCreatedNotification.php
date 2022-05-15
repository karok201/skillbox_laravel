<?php

namespace App\Listeners;

use App\Events\ArticleCreated;

class SendArticleCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\ArticleCreated  $event
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
        \Mail::to($event->article->owner->email)->send(
            new \App\Mail\ArticleCreated($event->article)
        );
    }
}
