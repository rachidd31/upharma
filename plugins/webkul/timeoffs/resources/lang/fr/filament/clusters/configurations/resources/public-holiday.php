<?php

return [
    'title' => 'Jours fériés',

    'model-label' => 'Jour férié',

    'navigation' => [
        'title' => 'Jours fériés',
    ],

    'global-search' => [
        'name'      => 'Nom',
        'date-from' => 'Date de début',
        'date-to'   => 'Date de fin',
    ],

    'form' => [
        'fields' => [
            'name'             => 'Nom',
            'name-placeholder' => 'Entrez le nom du jour férié',
            'date-from'        => 'Date de début',
            'date-to'          => 'Date de fin',
            'color'            => 'Couleur',
            'calendar'         => 'Calendrier',
        ],
    ],

    'table' => [
        'columns' => [
            'name'         => 'Nom',
            'company-name' => 'Nom de l\'entreprise',
            'calendar'     => 'Calendrier',
            'created-by'   => 'Créé par',
            'date-from'    => 'Date de début',
            'date-to'      => 'Date de fin',
        ],

        'filters' => [
            'name'         => 'Nom',
            'company-name' => 'Nom de l\'entreprise',
            'created-by'   => 'Créé par',
            'date-from'    => 'Date de début',
            'date-to'      => 'Date de fin',
            'created-at'   => 'Créé le',
            'updated-at'   => 'Mis à jour le',
        ],

        'groups' => [
            'name'         => 'Nom',
            'company-name' => 'Nom de l\'entreprise',
            'created-by'   => 'Créé par',
            'date-from'    => 'Date de début',
            'date-to'      => 'Date de fin',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Jour férié mis à jour',
                    'body'  => 'Le jour férié a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Jour férié supprimé',
                    'body'  => 'Le jour férié a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Jours fériés supprimés',
                    'body'  => 'Les jours fériés ont été supprimés avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'entries' => [
            'name'      => 'Nom',
            'date-from' => 'Date de début',
            'date-to'   => 'Date de fin',
            'color'     => 'Couleur',
        ],
    ],
];
