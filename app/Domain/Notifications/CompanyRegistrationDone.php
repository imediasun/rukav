<?

namespace App\Domain\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Domain\Company\Models\Company;
use Illuminate\Notifications\Messages\MailMessage;

class CompanyRegistrationDone extends Notification //implements ShouldQueue
{
//use Queueable;

public $company;

public function __construct(Company $company){
    $this->company=$company;

    $this->user=\App\User::where('email',$this->company->email)->first();
}
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        \Log::info($this->company);
        \Log::info($this->user);
        $url = url('/admin/profile/'.$this->user->remember_token);

        return (new MailMessage)
            ->greeting('Hello!')
            ->line('Вы можете залогиниться перейдя по ссылке или нажав кнопку')
            ->action('Войти в админку', $url)
            ->line('Логин: '.$this->user->email)
        ->line('Временный Пароль: YouCanChangePassword');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}