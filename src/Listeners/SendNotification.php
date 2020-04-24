<?php

namespace Donparapidos\Horizon\Listeners;

use Donparapidos\Horizon\Lock;
use Donparapidos\Horizon\Horizon;
use Illuminate\Support\Facades\Notification;

class SendNotification
{
    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        $notification = $event->toNotification();

        if (! app(Lock::class)->get('notification:'.$notification->signature(), 300)) {
            return;
        }

        Notification::route('slack', Horizon::$slackWebhookUrl)
                    ->route('nexmo', Horizon::$smsNumber)
                    ->route('mail', Horizon::$email)
                    ->notify($notification);
    }
}
