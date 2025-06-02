<?php

return [
    'global-search' => [
        'zip-from' => 'Code postal de',
        'zip-to'   => 'Code postal à',
        'name'     => 'Nom',
    ],

    'form' => [
        'fields' => [
            'name'                 => 'Nom',
            'foreign-vat'          => 'TVA étrangère',
            'country'              => 'Pays',
            'country-group'        => 'Groupe de pays',
            'zip-from'             => 'Code postal de',
            'zip-to'               => 'Code postal à',
            'detect-automatically' => 'Détecter automatiquement',
            'notes'                => 'Notes',
        ],
    ],

    'table' => [
        'columns' => [
            'name'                 => 'Nom',
            'company'              => 'Entreprise',
            'country'              => 'Pays',
            'country-group'        => 'Groupe de pays',
            'created-by'           => 'Créé par',
            'zip-from'             => 'Code postal de',
            'zip-to'               => 'Code postal à',
            'status'               => 'Statut',
            'detect-automatically' => 'Détecter automatiquement',
        ],

        'actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Position fiscale supprimée',
                    'body'  => 'La position fiscale a été supprimée avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Position fiscale supprimée',
                    'body'  => 'Les positions fiscales ont été supprimées avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'entries' => [
            'name'                 => 'Nom',
            'foreign-vat'          => 'TVA étrangère',
            'country'              => 'Pays',
            'country-group'        => 'Groupe de pays',
            'zip-from'             => 'Code postal de',
            'zip-to'               => 'Code postal à',
            'detect-automatically' => 'Détecter automatiquement',
            'notes'                => 'Notes',
        ],
    ],
];
