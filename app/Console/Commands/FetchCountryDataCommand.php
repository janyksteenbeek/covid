<?php

namespace App\Console\Commands;

use App\Jobs\FetchDataForCountryJob;
use Illuminate\Console\Command;
use Symfony\Component\Intl\Countries;

class FetchCountryDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data for all countries';

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
        foreach(Countries::getAlpha3Codes() as $countryCode) {
            FetchDataForCountryJob::dispatch($countryCode);
        }
    }
}
