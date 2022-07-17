<?php

namespace App\Jobs\Email;

use App\Mail\EventEmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class SendCreateEventNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    public function handle()
    {
        Redis::throttle('emailVerification')->allow(2)->every(1)->then(function () {
            Mail::to('bokchekee97@gmail.com')->send(new EventEmailNotification($this->event));
        }, function () {
            return $this->release(2);
        });
    }
}
