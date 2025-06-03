<?php

return [
    'navigation' => [
        'title' => 'Étapes du Projet',
    ],

    'form' => [
        'name' => 'Nom',
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'groups' => [
            'name'         => 'Nom',
            'is-completed' => 'Est Terminé',
            'project'      => 'Projet',
            'created-at'   => 'Créé le',
        ],

        'filters' => [
            'is-completed' => 'Est Terminé',
            'project'      => 'Projet',
            'creator'      => 'Créateur',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Étape du projet mise à jour',
                    'body'  => 'L\'étape du projet a été mise à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Étape du projet restaurée',
                    'body'  => 'L\'étape du projet a été restaurée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Étape du projet supprimée',
                    'body'  => 'L\'étape du projet a été supprimée avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Étape du projet supprimée définitivement',
                    'body'  => 'L\'étape du projet a été supprimée définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Étapes du projet restaurées',
                    'body'  => 'Les étapes du projet ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Étapes du projet supprimées',
                    'body'  => 'Les étapes du projet ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Étapes du projet supprimées définitivement',
                    'body'  => 'Les étapes du projet ont été supprimées définitivement avec succès.',
                ],
            ],
        ],
    ],
];