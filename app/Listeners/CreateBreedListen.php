<?php

namespace App\Listeners;

use App\Events\CreateBreedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class CreateBreedListen
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
    public function handle(CreateBreedEvent $event): void
    {
        Cache::forget('manal');
    }
}
