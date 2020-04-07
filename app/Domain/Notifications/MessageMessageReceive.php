<?

namespace App\Domain\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Domain\Customer\Models\Message;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class MessageMessageReceive extends Notification //implements ShouldQueue
{
//use Queueable;

public $customer;

public function __construct(User $customer){
    $this->customer=$customer;

    //$this->customer=\App\User::where('id',$this->customer->user_id)->first();
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
        //$url = url('/badge/'.$this->customer->remember_token);

         $message=(new MailMessage)
            ->greeting('Hello!')
            ->line('Вы получили новый бэйдж');
            //->action('Войти в систему', $url)

         \Log::info('Message',array($message));

        return $message;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}