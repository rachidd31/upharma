<?php

return [
    'header-actions' => [
        'delete' => [
            'notification' => [
                'title' => 'Candidat supprimé',
                'body'  => 'Le candidat a été supprimé avec succès.',
            ],
        ],

        'refuse' => [
            'notification' => [
                'title' => 'Candidat refusé',
                'body'  => 'Le candidat a été refusé avec succès.',
            ],
        ],

        'reopen' => [
            'notification' => [
                'title' => 'Candidat rouvert',
                'body'  => 'Le candidat a été rouvert avec succès.',
            ],
        ],

        'state' => [
            'notification' => [
                'title' => 'État du candidat mis à jour',
                'body'  => 'L\'état du candidat a été mis à jour avec succès.',
            ],
        ],
    ],

    'mail' => [
        'application-refused' => [
            'subject' => 'Votre candidature : :application',
        ],
    ],
];
