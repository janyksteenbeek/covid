<?php

namespace App\Console\Commands;

use App\Jobs\FetchDataForCountryJob;
use Illuminate\Console\Command;

class FetchCountryDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:country {code}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data for a specific country';

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
        FetchDataForCountryJob::dispatch(strtoupper($this->argument('code')));
    }
}
