<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PostCreatedEmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostCreatedEmal
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $subscribers = $event->post->author->subscribers;

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new PostCreatedEmailNotification($event->post));
        }
    }
}
