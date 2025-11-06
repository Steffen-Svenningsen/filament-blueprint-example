<?php

return [

    'label' => 'Opsætning',

    'modal' => [

        'heading' => 'Opsætning af authenticator app',

        'description' => <<<'BLADE'
            Du skal bruge en app som Google Authenticator (<x-filament::link href="https://itunes.apple.com/us/app/google-authenticator/id388497605" target="_blank">iOS</x-filament::link>, <x-filament::link href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" target="_blank">Android</x-filament::link>) for at fuldføre denne proces.
            BLADE,

        'content' => [

            'qr_code' => [

                'instruction' => 'Scan denne QR-kode med din authenticator app:',

                'alt' => 'QR-kode til scanning med en authenticator app',

            ],

            'text_code' => [

                'instruction' => 'Eller indtast denne kode manuelt:',

                'messages' => [
                    'copied' => 'Kopieret',
                ],

            ],

            'recovery_codes' => [

                'instruction' => 'Gem venligst følgende gendannelseskoder på et sikkert sted. De vises kun én gang, så du får brug for dem, hvis du mister adgangen til din authenticator app:',

            ],

        ],

        'form' => [

            'code' => [

                'label' => 'Indtast den 6-cifrede kode fra authenticator appen',

                'validation_attribute' => 'kode',

                'below_content' => 'Du skal indtaste den 6-cifrede kode fra din authenticator app hver gang du logger ind eller udfører følsomme handlinger.',

                'messages' => [

                    'invalid' => 'Den kode du indtastede er ugyldig.',

                ],

            ],

        ],

        'actions' => [

            'submit' => [
                'label' => 'Aktiver authenticator app',
            ],

        ],

    ],

    'notifications' => [

        'enabled' => [
            'title' => 'Authenticator app er blevet aktiveret',
        ],

    ],

];
