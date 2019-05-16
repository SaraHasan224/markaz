<?php

namespace App\Listeners;

use App\Events\PromotionWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Helpers\Helper;

use App\DeviceToken;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;


class PromotionWasCreatedSuccessfully implements ShouldQueue
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
     * @param  PromotionWasCreated  $event
     * @return void
     */
    public function handle(PromotionWasCreated $event)
    {


         $promotionId = $event->promotion;
         $promotion_repo = app()->make('PromotionRepository');
         $store_repo = app()->make('StoreRepository');
         $promotion = $promotion_repo->findById($promotionId);
         $store = $store_repo->findById($promotion->store_id);
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
        $deviceTokens="cKX8V9IDzss:APA91bGwVeE2hSMYnDPMevkRzMmoy3ziU_boCOuVtmBmal5wVa7Eon0QhHLMzwcZqFaYKUjbK66G4MthljUoj1hnHxfqppyWEMqHf7VWSxOODPOX7CS-LMQyyl-Hhr_JMNPw4qWdMIBi";
        $downstreamResponse = FCM::sendTo($deviceTokens, $option, $notification, $data);
        $success = $downstreamResponse->numberSuccess();
    
    }
}
