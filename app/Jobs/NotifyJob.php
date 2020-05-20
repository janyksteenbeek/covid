<?php

namespace App\Jobs;

use App\Notifications\DataUpdatedNotification;
use App\Statistic;
use App\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Subscriber
     */
    private $subscriber;
    /**
     * @var Statistic
     */
    private $statistic;

    /**
     * Create a new job instance.
     *
     * @param Subscriber $subscriber
     * @param Statistic $statistic
     */
    public function __construct(Subscriber $subscriber, Statistic $statistic)
    {
        $this->subscriber = $subscriber;
        $this->statistic = $statistic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->subscriber->notifyNow(new DataUpdatedNotification($this->statistic));
        $this->subscriber->update(['last_notified_at' => $this->statistic->date]);
    }
}
