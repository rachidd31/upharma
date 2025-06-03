<?php

return [
    'navigation' => [
        'title' => 'Étapes des Tâches',
    ],

    'form' => [
        'name'    => 'Nom',
        'project' => 'Projet',
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'project'    => 'Projet',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'groups' => [
            'project'    => 'Projet',
            'created-at' => 'Créé le',
        ],

        'filters' => [
            'project' => 'Projet',
        ],

        'actions' => [
            'edit' => [
                'notification' => [
                    'title' => 'Étape de tâche mise à jour',
                    'body'  => 'L\'étape de tâche a été mise à jour avec succès.',
                ],
            ],

            'restore' => [
                'notification' => [
                    'title' => 'Étape de tâche restaurée',
                    'body'  => 'L\'étape de tâche a été restaurée avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Étape de tâche supprimée',
                    'body'  => 'L\'étape de tâche a été supprimée avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Étape de tâche supprimée définitivement',
                    'body'  => 'L\'étape de tâche a été supprimée définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Étapes de tâches restaurées',
                    'body'  => 'Les étapes de tâches ont été restaurées avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Étapes de tâches supprimées',
                    'body'  => 'Les étapes de tâches ont été supprimées avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Étapes de tâches supprimées définitivement',
                    'body'  => 'Les étapes de tâches ont été supprimées définitivement avec succès.',
                ],
            ],
        ],
    ],
];