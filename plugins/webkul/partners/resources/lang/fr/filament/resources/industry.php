<?php

return [
    'form' => [
        'name'      => 'Nom',
        'full-name' => 'Nom Complet',
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'full-name'  => 'Nom Complet',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Industrie mise à jour',
                    'body'  => 'L\'industrie a été mise à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Industrie restaurée',
                    'body'  => 'L\'industrie a été restaurée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Industrie supprimée',
                    'body'  => 'L\'industrie a été supprimée avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Industrie supprimée définitivement',
                    'body'  => 'L\'industrie a été supprimée définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Industries restaurées',
                    'body'  => 'Les industries ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Industries supprimées',
                    'body'  => 'Les industries ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Industries supprimées définitivement',
                    'body'  => 'Les industries ont été supprimées définitivement avec succès.',
                ],
            ],
        ],
    ],
];