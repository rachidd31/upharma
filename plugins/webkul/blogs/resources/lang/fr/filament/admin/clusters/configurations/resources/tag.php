<?php

return [
    'navigation' => [
        'title' => 'Tags',
        'group' => 'Blog',
    ],

    'form' => [
        'name'  => 'Nom',
        'color' => 'Couleur',
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'color'      => 'Couleur',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Tag mis à jour',
                    'body'  => 'Le tag a été mis à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Tag restauré',
                    'body'  => 'Le tag a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Tag supprimé',
                    'body'  => 'Le tag a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Tag supprimé définitivement',
                    'body'  => 'Le tag a été supprimé définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Tags restaurés',
                    'body'  => 'Les tags ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Tags supprimés',
                    'body'  => 'Les tags ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Tags supprimés définitivement',
                    'body'  => 'Les tags ont été supprimés définitivement avec succès.',
                ],
            ],
        ],
    ],
];
