<?

namespace App\Domain\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerEmail extends Notification //implements ShouldQueue
{
//use Queueable;

public $customer;

public function __construct(User $customer){
    $this->customer=$customer;

    //$this->customer=\App\Domain\Customer\Models\Customer::where('email',$this->customer->email)->first();
}
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        \Log::info($this->customer);
        \Log::info($this->customer);
        $url = url('/profile/'.$this->customer->remember_token);

        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Вы получили новое сообщение в ответ на свое объявление')
            ->action('Войти на сайт', $url);
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}