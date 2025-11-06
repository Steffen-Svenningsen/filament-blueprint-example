<?php

return [

    'management_schema' => [

        'actions' => [

            'label' => 'Authenticator app',

            'below_content' => 'Brug en sikker app til at generere en midlertidig kode til loginverifikation.',

            'messages' => [
                'enabled' => 'Aktiveret',
                'disabled' => 'Deaktiveret',
            ],

        ],

    ],

    'login_form' => [

        'label' => 'Brug en kode fra din authenticator app',

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

];
