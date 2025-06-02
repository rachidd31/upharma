<?php

return [
    'title' => 'Absence',

    'model-label' => 'Mon absence',

    'navigation' => [
        'title' => 'Mon absence',
    ],

    'global-search' => [
        'time-off-type'     => 'Type d\'absence',
        'request-date-from' => 'Date de début de la demande',
        'request-date-to'   => 'Date de fin de la demande',
    ],

    'form' => [
        'fields' => [
            'time-off-type'     => 'Type d\'absence',
            'date'              => 'Date',
            'dates'             => 'Dates',
            'request-date-from' => 'Date de début de la demande',
            'request-date-to'   => 'Date de fin de la demande',
            'description'       => 'Description',
            'period'            => 'Période',
            'half-day'          => 'Demi-journée',
            'requested-days'    => 'Demandé (Jours/Heures)',
            'description'       => 'Description',
            'attachment'        => 'Pièce jointe',
            'day'               => ':day jour',
            'days'              => ':days jour(s)',
        ],
    ],

    'table' => [
        'columns' => [
            'employee-name'  => 'Employé',
            'time-off-type'  => 'Type d\'absence',
            'description'    => 'Description',
            'date-from'      => 'Date de début',
            'date-to'        => 'Date de fin',
            'duration'       => 'Durée',
            'status'         => 'Statut',
        ],

        'groups' => [
            'employee-name' => 'Employé',
            'time-off-type' => 'Type d\'absence',
            'status'        => 'Statut',
            'start-date'    => 'Date de début',
            'start-to'      => 'Date de fin',
            'updated-at'    => 'Mis à jour le',
            'created-at'    => 'Créé le',
        ],

        'actions' => [
            'approve' => [
                'title' => [
                    'validate' => 'Valider',
                    'approve'  => 'Approuver',
                ],
                'notification' => [
                    'title' => 'Absence approuvée',
                    'body'  => 'L\'absence a été approuvée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Absence supprimée',
                    'body'  => 'L\'absence a été supprimée avec succès.',
                ],
            ],

            'refused' => [
                'title'        => 'Refuser',
                'notification' => [
                    'title' => 'Absence refusée',
                    'body'  => 'L\'absence a été refusée avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Absences supprimées',
                    'body'  => 'Les absences ont été supprimées avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'entries' => [
            'time-off-type'     => 'Type d\'absence',
            'date'              => 'Date',
            'dates'             => 'Dates',
            'request-date-from' => 'Date de début de la demande',
            'request-date-to'   => 'Date de fin de la demande',
            'description'       => 'Description',
            'period'            => 'Période',
            'half-day'          => 'Demi-journée',
            'requested-days'    => 'Demandé (Jours/Heures)',
            'description'       => 'Description',
            'attachment'        => 'Pièce jointe',
            'day'               => ':day jour',
            'days'              => ':days jour(s)',
        ],
    ],
];
