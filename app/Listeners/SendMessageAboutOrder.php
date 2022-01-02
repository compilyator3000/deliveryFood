<?php

namespace App\Listeners;

use App\Events\OrderEvent;
use App\Models\TelegramNotifier;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageAboutOrder
{


    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
           TelegramNotifier::notify($event->message);
    }
}
