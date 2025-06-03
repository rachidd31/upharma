<?php

return [
    'navigation' => [
        'title' => 'Jalons',
    ],

    'form' => [
        'name'         => 'Nom',
        'deadline'     => 'Date Limite',
        'is-completed' => 'Est Terminé',
        'project'      => 'Projet',
    ],

    'table' => [
        'columns' => [
            'name'         => 'Nom',
            'deadline'     => 'Date Limite',
            'is-completed' => 'Est Terminé',
            'completed-at' => 'Terminé le',
            'project'      => 'Projet',
            'creator'      => 'Créateur',
            'created-at'   => 'Créé le',
            'updated-at'   => 'Mis à jour le',
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
                    'title' => 'Jalon mis à jour',
                    'body'  => 'Le jalon a été mis à jour avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Jalon supprimé',
                    'body'  => 'Le jalon a été supprimé avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'delete' => [
                'notification' => [
                    'title' => 'Jalons supprimés',
                    'body'  => 'Les jalons ont été supprimés avec succès.',
                ],
            ],
        ],
    ],
];