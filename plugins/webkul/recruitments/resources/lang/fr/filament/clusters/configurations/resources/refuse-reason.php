<?php

return [
    'title' => 'Raison de Refus',

    'navigation' => [
        'title' => 'Raisons de Refus',
        'group' => 'Candidatures',
    ],

    'form' => [
        'fields' => [
            'name'             => 'Nom',
            'template'         => [
                'title'                    => 'Modèle',
                'applicant-refuse'         => 'Refus Candidat',
                'applicant-not-interested' => 'Candidat Non Intéressé',
            ],
            'name-placeholder' => 'Saisir le nom de la raison de refus',
        ],
    ],

    'table' => [
        'columns' => [
            'id'         => 'ID',
            'name'       => 'Nom',
            'template'   => 'Modèle',
            'created-by' => 'Créé par',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'filters' => [
            'name'       => 'Nom',
            'employee'   => 'Employé',
            'created-by' => 'Créé par',
            'updated-at' => 'Mis à jour le',
            'created-at' => 'Créé le',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Raison de refus mise à jour',
                    'body'  => 'La raison de refus a été mise à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Raison de refus supprimée',
                    'body'  => 'La raison de refus a été supprimée avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Raisons de refus supprimées',
                    'body'  => 'Les raisons de refus ont été supprimées avec succès.',
                ],
            ],
        ],

        'empty-state-action' => [
            'create' => [
                'notification' => [
                    'title' => 'Raison de refus créée',
                    'body'  => 'La raison de refus a été créée avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'name'     => 'Nom',
        'template' => 'Modèle',
    ],
];