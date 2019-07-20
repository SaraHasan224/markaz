<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Helpers\Helper;

use App\DeviceToken;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;


class UserWasCreatedSuccessfully implements ShouldQueue
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
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {


        $userId = $event->user;
        $user_repo = app()->make('UserRepository');
        $user = $user_repo->findById($userId);
        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(2419200);
        $optionBuiler->setPriority('high');
        $optionBuiler->setContentAvailable(true);
        $notificationBuilder = new PayloadNotificationBuilder('User has been created');
        $notificationBuilder->setBody($user->name.' ,Your account has been created sucessfully')
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['custom' => [
                                    'view' => 1002,
                                    'view_id' => $user->id
                    ]]);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();

        $data = $dataBuilder->build();
        $deviceTokens="dE6KPBrurgU:APA91bHF5FIs-TEtRTyF8a7sQ4yU5g6wH4PebGt24a21Qe7xtdZTFR43MzA4q9Kb4PBxKvJ7Fzb5UQtz9ZvwumMSxiCjbESplfUk92E98xZbBWPgeYjMqHLD8GBIG1Ag1OAWw2zyx26R";
        $downstreamResponse = FCM::sendTo($deviceTokens, $option, $notification, $data);
        $success = $downstreamResponse->numberSuccess();
        $failure = $downstreamResponse->numberFailure();
        
    
    }
}
