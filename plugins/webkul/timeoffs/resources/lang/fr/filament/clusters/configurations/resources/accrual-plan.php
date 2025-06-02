<?php

return [
    'title'      => 'Plan d\'acquisition',
    'navigation' => [
        'title' => 'Plan d\'acquisition',
    ],

    'global-search' => [
        'name'          => 'Nom',
        'time-off-type' => 'Type de congé',
        'created-by'    => 'Créé par',
    ],

    'form' => [
        'fields' => [
            'name'                    => 'Titre',
            'is-based-on-worked-time' => 'Est basé sur le temps travaillé',
            'accrued-gain-time'       => 'Temps acquis',
            'carry-over-time'         => 'Temps reporté',
            'carry-over-date'         => 'Date de report',
            'status'                  => 'Statut',
        ],
    ],

    'table' => [
        'columns' => [
            'name'   => 'Nom',
            'levels' => 'Niveaux',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Plan d\'acquisition supprimé',
                    'body'  => 'Le plan d\'acquisition a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Plan d\'acquisition supprimé',
                    'body'  => 'Le plan d\'acquisition a été supprimé avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'entries' => [
            'name'                    => 'Nom',
            'is-based-on-worked-time' => 'Est basé sur le temps travaillé',
            'accrued-gain-time'       => 'Temps acquis',
            'carry-over-time'         => 'Temps reporté',
            'carry-over-day'          => 'Jour de report',
            'carry-over-month'        => 'Mois de report',
        ],
    ],
];
