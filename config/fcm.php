<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAXXm1yBE:APA91bE27kvWCldNxBdCD2XXfT00T6v9EOM4nnGi2ehpv0uv1xeHXKMEjlM6xn9uCihPUh08TOVsCD1QpnuNsDT3s1ZPJpErbPXrvMRxziPpGl-gYlBElkvmYDv-tsjinSTgXHMZje-E'),
        'sender_id' => env('FCM_SENDER_ID', '401473914897'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
