<?

namespace App\Domain\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Domain\Manager\Models\Manager;
use Illuminate\Notifications\Messages\MailMessage;

class ManagerRegistrationDone extends Notification //implements ShouldQueue
{
//use Queueable;

public $manager;

public function __construct(Manager $manager){
    $this->manager=$manager;

    $this->user=\App\User::where('id',$this->manager->user_id)->first();
}
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        \Log::info($this->manager);
        \Log::info($this->user);
        $url = url('/profile/'.$this->user->remember_token);

        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Вам назначена роль менеджера')
            ->action('Войти в админку', $url);
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}