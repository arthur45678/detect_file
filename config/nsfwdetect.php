<?php

return [



    /*
   |--------------------------------------------------------------------------
   | Default NSFWDetect Service
   |--------------------------------------------------------------------------
   |
   | This option controls the default mailer that is used to send any email
   | messages sent by your application. Alternative mailers may be setup
   | and used as needed; however, this mailer will be used by default.
   |
   */

    'default' => env('NSFW_DETECT_SERVICE', 'sightengine'),

    /*
    |--------------------------------------------------------------------------
    | Sightengine
    |--------------------------------------------------------------------------
    |  https://sightengine.com/
    |
    */
    'sightengine' => [
        'api_url' => 'https://api.sightengine.com/1.0',
        'API' => [
            'sightengine_api_user' => env('SIGHTENGINE_API_USER'),
            'sightengine_api_secret' => env('SIGHTENGINE_API_SECRET'),
            'sightengine_image_workflow' => env('SIGHTENGINE_IMAGE_WORKFLOW_ID'),
            'sightengine_video_workflow' => env('SIGHTENGINE_VIDEO_WORKFLOW_ID'),

        ],
        'image-detect' => [
            /**
             * Image filters
             * True - enabled, false - disbled
             */
            'models' => [
                'nudity' => true,
                'wad' => true,
                'properties' => true,
                'celebrities' => true,
                'offensive' => true,
                'faces' => true,
                'scam' => true,
                'text-content' => true,
                'face-attributes' => true,
                'gore' => true,
                'text' => true,
                'qr-content' => true,
            ],
            /**
             * Detector API url
             */
            'api_uri' => '/check.json?',
        ],
        'video-detect' => [
            /**
             * Video filters
             * True - enabled, false - disbled
             */
            'models' => [
                'nudity' => true,'wad' => true,'faces' => true,'face-attributes' => true,'celebrities' => true,
            ],

            /**
             * Detector API url
             */
            'api_uri' => '/video/check-sync.json',
        ],

    ],


];
