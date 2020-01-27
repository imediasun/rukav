<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 2019-11-15
 * Time: 16:41
 */

namespace App\Domain\Base\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Customer\Models\Customer;

/**
 * Interface BaseServiceInterface
 * @package App\Services\Base\Crud\Contracts
 */
interface BaseServiceInterface
{


    /**
     * Send Notification
     *
     * @param $company
     * @param $notification
     * @return bool
     */
    public function sendNotification(Model $company);

    /**
     * Send Message Notification
     *
     * @param $company
     * @param $notification
     * @return bool
     */
    public function sendMessageNotification(Model $company);
}
