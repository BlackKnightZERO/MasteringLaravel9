<?php

namespace App\Listeners;

use App\Events\NewsletterSubscribed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed as SubMail;

class SendNewsletterSubscriptionNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewsletterSubscribed  $event
     * @return void
     */
    public function handle(NewsletterSubscribed $event)
    {
        Mail::to($event->newsletter->email)->send(new SubMail($event->newsletter->email));
    }
}
