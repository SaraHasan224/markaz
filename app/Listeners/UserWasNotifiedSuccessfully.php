<?php

namespace App\Listeners;

use App\Events\UserWasNotified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Helpers\Helper;

use App\DeviceToken;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;


class UserWasNotifiedSuccessfully implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasNotified  $event
     * @return void
     */
    public function handle(UserWasNotified $event)
    {


        $promotion = $event->promotion;
        $store = $event->store;
        $user = $event->user;
        $access_token = $event->access_token;
        //  $promotionId = $event->promotion;
        //  $promotion_repo = app()->make('PromotionRepository');
        //  $store_repo = app()->make('StoreRepository');
        //  $promotion = $promotion_repo->findById($promotionId);
        //  $store = $store_repo->findById($promotion->store_id);
        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(2419200);
        $optionBuiler->setPriority('high');
        $optionBuiler->setContentAvailable(true);
        $notificationBuilder = new PayloadNotificationBuilder($store->name);
        $notificationBuilder->setBody($promotion->title)
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['custom' => [
                                    'view' => 1002,
                                    'view_id' =>12
                    ]]);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();

        $data = $dataBuilder->build();
        $deviceTokens=$access_token->token;
        $downstreamResponse = FCM::sendTo($deviceTokens, $option, $notification, $data);
        $success = $downstreamResponse->numberSuccess();
        $failure = $downstreamResponse->numberFailure();
        dump($success);
        dump($failure);
       
    }
}
