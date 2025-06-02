<?php

return [
    'title' => 'Gérer les entrepôts',

    'form' => [
        'enable-locations'                      => 'Emplacements',
        'enable-locations-helper-text'          => 'Suivez l\'emplacement des produits dans votre entrepôt',
        'configure-locations'                   => 'Configurer les emplacements',
        'enable-multi-steps-routes'             => 'Itinéraires multi-étapes',
        'enable-multi-steps-routes-helper-text' => 'Utilisez vos propres itinéraires pour gérer le transfert des produits entre les entrepôts',
        'configure-routes'                      => 'Configurer les itinéraires d\'entrepôt',
    ],

    'before-save' => [
        'notification' => [
            'warning' => [
                'title' => 'Avoir plusieurs entrepôts',
                'body'  => 'Vous ne pouvez pas désactiver la multi-localisation si vous avez plus d\'un entrepôt.',
            ],
        ],
    ],
];
