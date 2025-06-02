<?php

return [
    'setup' => [
        'title'               => 'Abonnés',
        'submit-action-title' => 'Ajouter un abonné',
        'tooltip'             => 'Ajouter un abonné',

        'form' => [
            'fields' => [
                'recipients'  => 'Destinataires',
                'notify-user' => 'Notifier l\'utilisateur',
                'add-a-note'  => 'Ajouter une note',
            ],
        ],

        'actions' => [
            'notification' => [
                'success' => [
                    'title' => 'Abonné ajouté',
                    'body'  => '":partner" a été ajouté en tant qu\'abonné.',
                ],

                'error' => [
                    'title' => 'Erreur lors de l\'ajout de l\'abonné',
                    'body'  => 'Échec de l\'ajout de ":partner" en tant qu\'abonné',
                ],
            ],

            'mail' => [
                'subject' => 'Invitation à suivre :model: :department',
            ],
        ],
    ],
];
