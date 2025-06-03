<?php

return [
    'navigation' => [
        'title' => 'Plans d\'Activité',
        'group' => 'Activités',
    ],

    'global-search' => [
        'name'         => 'Département',
        'department'   => 'Département',
        'manager'      => 'Manager',
        'company'      => 'Entreprise',
        'plugin'       => 'Plugin',
        'creator-name' => 'Créé par',
    ],

    'table' => [
        'columns' => [
            'name'       => 'Nom',
            'status'     => 'Statut',
            'department' => 'Département',
            'company'    => 'Entreprise',
            'manager'    => 'Manager',
            'created-by' => 'Créé par',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'filters' => [
            'name'           => 'Nom',
            'plugin'         => 'Plugin',
            'activity-types' => 'Types d\'activité',
            'company'        => 'Entreprise',
            'department'     => 'Département',
            'is-active'      => 'Statut',
            'updated-at'     => 'Mis à jour le',
            'created-at'     => 'Créé le',
        ],

        'groups' => [
            'status'     => 'Statut',
            'name'       => 'Nom',
            'created-by' => 'Créé par',
            'created-at' => 'Créé le',
            'updated-at' => 'Mis à jour le',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Plan d\'Activité restauré',
                    'body'  => 'Le plan d\'activité a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Plan d\'Activité supprimé',
                    'body'  => 'Le plan d\'activité a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Plan d\'Activité supprimé définitivement',
                    'body'  => 'Le plan d\'activité a été supprimé définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Plans d\'Activité restaurés',
                    'body'  => 'Les plans d\'activité ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Plans d\'Activité supprimés',
                    'body'  => 'Les plans d\'activité ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Plans d\'Activité supprimés définitivement',
                    'body'  => 'Les plans d\'activité ont été supprimés définitivement avec succès.',
                ],
            ],
        ],

        'empty-state' => [
            'create' => [
                'notification' => [
                    'title' => 'Plan d\'Activité créé',
                    'body'  => 'Le plan d\'activité a été créé avec succès.',
                ],
            ],
        ],
    ],
];