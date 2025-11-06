<?php

return [

    'label' => 'Slå fra',

    'modal' => [

        'heading' => 'Deaktiver authenticator app',

        'description' => 'Er du sikker på, at du vil stoppe med at bruge authenticator appen? Deaktivering af denne vil fjerne et ekstra lag af sikkerhed fra din konto.',

        'form' => [

            'code' => [

                'label' => 'Indtast den 6-cifrede kode fra authenticator appen',

                'validation_attribute' => 'kode',

                'actions' => [

                    'use_recovery_code' => [
                        'label' => 'Brug en gendannelseskode i stedet',
                    ],

                ],

                'messages' => [

                    'invalid' => 'Den kode du indtastede er ugyldig.',

                ],

            ],

            'recovery_code' => [

                'label' => 'Eller indtast en gendannelseskode',

                'validation_attribute' => 'gendannelseskode',

                'messages' => [

                    'invalid' => 'Den gendannelseskode du indtastede er ugyldig.',

                ],

            ],

        ],

        'actions' => [

            'submit' => [
                'label' => 'Deaktiver authenticator app',
            ],

        ],

    ],

    'notifications' => [

        'disabled' => [
            'title' => 'Authenticator app er blevet deaktiveret',
        ],

    ],

];
