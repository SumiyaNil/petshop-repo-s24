<?php

namespace App\Listeners;

use App\Events\CreateLocationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class CreateLocationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateLocationEvent $event): void
    {
        Cache::forget('saima');
    }
}
