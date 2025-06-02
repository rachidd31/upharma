<?php

return [
    'title' => 'Départements',

    'navigation' => [
        'title' => 'Départements',
        'group' => 'Employés',
    ],

    'global-search' => [
        'name'               => 'Département',
        'department-manager' => 'Manager',
        'company'            => 'Entreprise',
    ],

    'form' => [
        'sections' => [
            'general' => [
                'title' => 'Informations générales',

                'fields' => [
                    'name'                => 'Nom',
                    'manager'             => 'Manager',
                    'parent-department'   => 'Département parent',
                    'manager-placeholder' => 'Sélectionner un manager',
                    'company'             => 'Entreprise',
                    'company-placeholder' => 'Sélectionner une entreprise',
                    'color'               => 'Couleur',
                ],
            ],

            'additional' => [
                'title'       => 'Informations supplémentaires',
                'description' => 'Informations supplémentaires sur ce département.',
            ],
        ],
    ],

    'table' => [
        'columns' => [
            'name'         => 'Nom',
            'manager-name' => 'Manager',
            'company-name' => 'Entreprise',
        ],

        'groups' => [
            'name'       => 'Nom',
            'manager'    => 'Manager',
            'company'    => 'Entreprise',
            'updated-at' => 'Mis à jour le',
            'created-at' => 'Créé le',
        ],

        'filters' => [
            'name'         => 'Nom',
            'manager-name' => 'Manager',
            'company-name' => 'Entreprise',
            'updated-at'   => 'Mis à jour le',
            'created-at'   => 'Créé le',
        ],

        'actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Département restauré',
                    'body'  => 'Le département a été restauré avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Département supprimé',
                    'body'  => 'Le département a été supprimé avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Département supprimé définitivement',
                    'body'  => 'Le département a été supprimé définitivement avec succès.',
                ],
            ],
        ],

        'bulk-actions' => [
            'restore' => [
                'notification' => [
                    'title' => 'Départements restaurés',
                    'body'  => 'Les départements ont été restaurés avec succès.',
                ],
            ],

            'delete' => [
                'notification' => [
                    'title' => 'Départements supprimés',
                    'body'  => 'Les départements ont été supprimés avec succès.',
                ],
            ],

            'force-delete' => [
                'notification' => [
                    'title' => 'Départements supprimés définitivement',
                    'body'  => 'Les départements ont été supprimés définitivement avec succès.',
                ],
            ],
        ],
    ],

    'infolist' => [
        'sections' => [
            'general' => [
                'title' => 'Général',

                'entries' => [
                    'name'            => 'Nom',
                    'manager'         => 'Manager',
                    'company'         => 'Entreprise',
                    'color'           => 'Couleur',
                    'hierarchy-title' => 'Organisation du département',
                ],
            ],
        ],
    ],
];
