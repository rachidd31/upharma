<?php

return [
    'modal-actions' => [
        'edit' => [
            'title' => 'Modifier',
        ],

        'delete' => [
            'title' => 'Supprimer',
        ],
    ],

    'view-action' => [
        'title'       => 'Voir',
        'description' => 'Voir la demande d\'absence',
    ],

    'header-actions' => [
        'create' => [
            'title'       => 'Nouvelle absence',
            'description' => 'Créer une demande d\'absence',

            'employee-not-found' => [
                'notification' => [
                    'title' => 'Employé introuvable',
                    'body'  => 'Veuillez ajouter un employé à votre profil avant de créer une demande d\'absence.',
                ],
            ],
        ],
    ],

    'form' => [
        'fields' => [
            'time-off-type'     => 'Type d\'absence',
            'request-date-from' => 'Date de début de la demande',
            'request-date-to'   => 'Date de fin de la demande',
            'period'            => 'Période',
            'half-day'          => 'Demi-journée',
            'requested-days'    => 'Demandé (Jours/Heures)',
            'description'       => 'Description',
        ],
    ],
    'infolist' => [
        'entries' => [
            'time-off-type'           => 'Type d\'absence',
            'request-date-from'       => 'Date de début de la demande',
            'request-date-to'         => 'Date de fin de la demande',
            'description'             => 'Description',
            'description-placeholder' => 'Aucune description fournie',
            'duration'                => 'Durée',
            'status'                  => 'Statut',
        ],
    ],
];
