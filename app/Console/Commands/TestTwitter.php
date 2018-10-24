<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Offer;
use App\Jobs\PostNewOfferTweet;

class TestTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Twitter Message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Use to test schedule for new offer
        //new (just went live)
        //expiring (ending in next 24 hours)

        // $offer = Offer::first();
        // dispatch_now(new PostNewOfferTweet($offer));
    }
}
