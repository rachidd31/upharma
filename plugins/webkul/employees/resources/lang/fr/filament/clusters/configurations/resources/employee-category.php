<?php

return [
    'title' => 'Tags',

    'navigation' => [
        'title' => 'Tags',
        'group' => 'Employé',
    ],

    'groups' => [
        'status'     => 'Statut',
        'created-by' => 'Créé par',
        'created-at' => 'Créé le',
        'updated-at' => 'Mis à jour le',
    ],

    'form' => [
        'fields' => [
            'name'  => 'Nom',
            'color' => 'Couleur',
        ],
    ],

    'table' => [
        'columns' => [
            'id'         => 'ID',
            'name'       => 'Nom',
            'color'      => 'Couleur',
            'created-by' => 'Créé par',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'filters' => [
            'name'       => 'Nom',
            'created-by' => 'Créé par',
            'updated-by' => 'Mis à jour par',
            'updated-at' => 'Mis à jour le',
            'created-at' => 'Créé le',
        ],

        'groups' => [
            'name'         => 'Nom',
            'job-position' => 'Poste',
            'color'        => 'Couleur',
            'created-by'   => 'Créé par',
            'created-at'   => 'Créé le',
            'updated-at'   => 'Mis à jour le',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Tag mis à jour',
                    'body'  => 'Le tag a été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Tag supprimé',
                    'body'  => 'Le tag a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Tags supprimés',
                    'body'  => 'Les tags ont été supprimés avec succès.',
                ],
            ],
        ],

        'empty-state-action' => [
            'create' => [
                'notification' => [
                    'title' => 'Tag créé',
                    'body'  => 'Le tag a été créé avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'name'  => 'Nom',
        'color' => 'Couleur',
    ],
];
