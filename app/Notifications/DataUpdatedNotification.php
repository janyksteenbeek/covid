<?php

namespace App\Notifications;

use App\Statistic;
use App\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Symfony\Component\Intl\Countries;

class DataUpdatedNotification extends Notification
{
    use Queueable;

    /**
     * @var Subscriber
     */
    private $subscriber;
    /**
     * @var Statistic
     */
    private $statistic;

    /**
     * Create a new notification instance.
     *
     * @param Statistic $statistic
     */
    public function __construct(Statistic $statistic)
    {
        $this->statistic = $statistic;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $country = Countries::getName($this->statistic->country_code);
        $date = $this->statistic->date->format('d-m-Y');

        return (new MailMessage)
            ->subject("New COVID-19 data for {$country} ({$date})")
                    ->greeting("New COVID-19 data for {$country} ({$date})")
                    ->line('New cases: ' . $this->statistic->new_cases)
                    ->line('New deceased: ' . $this->statistic->new_deaths)
                    ->line('Total cases: ' . $this->statistic->total_cases)
                    ->line('Total deceased: ' . $this->statistic->total_deaths)
                    ->line('Total recovered: ' . $this->statistic->total_deaths)
                    ->action('View data on COVID tracker', route('country', ['code' => $this->statistic->country_code]))
                    ->line('If you would like to unsubscribe from these e-mails, please reply to this e-mail and we will remove you from the list.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
