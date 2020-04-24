<?

namespace App\Domain\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerRegistrationDone extends Notification //implements ShouldQueue
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
            ->line('Вы можете залогиниться перейдя по ссылке или нажав кнопку')
            ->action('Войти в админку', $url)
            ->line('Логин: '.$this->customer->email)
        ->line('Временный Пароль: PasswordYouCanChangeIT');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}