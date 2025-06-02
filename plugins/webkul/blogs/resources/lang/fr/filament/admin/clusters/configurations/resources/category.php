<?php

return [
    'navigation' => [
        'title' => 'Catégories',
        'group' => 'Blog',
    ],

    'form' => [
        'fields' => [
            'name'             => 'Nom',
            'name-placeholder' => 'Titre de la catégorie...',
            'sub-title'        => 'Sous-titre',
        ],
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'sub-title'  => 'Sous-titre',
            'posts'      => 'Articles',
            'created-at' => 'Créé le',
        ],

        'filters' => [
            'is-published' => 'Est publié',
            'author'       => 'Auteur',
            'creator'      => 'Créé par',
            'category'     => 'Catégorie',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Catégorie mise à jour',
                    'body'  => 'La catégorie a été mise à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Catégorie restaurée',
                    'body'  => 'La catégorie a été restaurée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Catégorie supprimée',
                    'body'  => 'La catégorie a été supprimée avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Catégorie supprimée définitivement',
                    'body'  => 'La catégorie a été supprimée définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Catégories restaurées',
                    'body'  => 'Les catégories ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Catégories supprimées',
                    'body'  => 'Les catégories ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Catégories supprimées définitivement',
                    'body'  => 'Les catégories ont été supprimées définitivement avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
    ],
];
