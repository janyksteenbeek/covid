<?php

namespace App\Jobs;

use App\Constants\Api;
use App\Statistic;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchDataForCountryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $country;

    /**
     * Create a new job instance.
     *
     * @param string $country
     */
    public function __construct(string $country)
    {
        $this->country = $country;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = Api::url($this->country);

        $data = Http::get($url)->json();

        if(! isset($data['timelineitems'])) {
            // No data found for this country, let's skip it.
            return;
        }

        $dailyData = collect($data['timelineitems'][0]);

        $dailyData->each(function ($item, $date) {
            if(! is_array($item)) return;

            $this->insertData(
                $this->parseDate($date),
                $item
            );

        });
    }

    private function insertData(Carbon $parseDate, array $data): ?Statistic
    {
        return Statistic::updateOrCreate([
            'country_code' => $this->country,
            'date' => $parseDate->format('Y-m-d')
        ],
        [
            'new_cases' => $data['new_daily_cases'],
            'new_deaths' => $data['new_daily_deaths'],
            'total_cases' => $data['total_cases'],
            'total_recoveries' => $data['total_recoveries'],
            'total_deaths' => $data['total_deaths'],
        ]);
    }

    private function parseDate(string $date): Carbon
    {
        return (new Carbon(strtotime( $date)));
    }
}
